<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 06/08/2020
 * Time: 20:02
 */

namespace App\Services;


use App\Repository\Bill\BillRepositoryInterface;
use App\Repository\BillDetail\BillDetailRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Service\BaseService;
use App\Transformers\Bill\BillTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class BillService extends BaseService
{
    private $billRepository;
    private $billDetailRepository;
    private $productRepository;

    public function __construct(BillRepositoryInterface $billRepository,
                                BillDetailRepositoryInterface $billDetailRepository,
                                ProductRepositoryInterface $productRepository)
    {
        $this->billRepository       = $billRepository;
        $this->billDetailRepository = $billDetailRepository;
        $this->productRepository    = $productRepository;
    }

    public function order(Request $request)
    {
        $user_id = $request->get('id');
        $name    = $request->get('name');
        $phone   = $request->get('phone');
        $address = $request->get('address');

        $cart = Session::has('cart') ? Session::get('cart') : [];

        $data['bil_user']         = intval($user_id);
        $data['bil_username']     = $name;
        $data['bil_user_phone']   = $phone;
        $data['bil_user_address'] = $address;
        $data['bil_sum_money']    = $cart->totalPrice;
        $data['bil_status']       = 1;

        $bill = $this->billRepository->create($data);

        $items = $cart->items;

        foreach ($items as $key => $value)
        {
            $bill_detail['bid_bill_id']      = $bill->id;
            $bill_detail['bid_product_id']   = $key;
            $bill_detail['bid_product_price']    = $value['item']->pro_price * ((100 - $value['item']->pro_sale) / 100);
            $bill_detail['bid_product_quantity'] = $value['qty'];

            $this->billDetailRepository->create($bill_detail);

            $product_total = $this->productRepository->firstById($key)->pro_total;

            $data_update_product['pro_total'] = $product_total - $value['qty'];

            $this->productRepository->updateById($key, $data_update_product);
        }

        Session::forget('cart');
        Session::flush();

        return true;
    }

    public function getBillToUser($id)
    {
        $bills = $this->billRepository->getBillWithUser($id);

        $array_bill = [];

        foreach ($bills as $bill)
        {
            $bill_id = $bill->id;

            $array_bill[$bill_id]['sum_money']  = $bill->bil_sum_money;
            $array_bill[$bill_id]['status']     = $bill->bil_status;

            $product_bill_detail = $this->billDetailRepository->getBillDetailWithBillId($bill_id);

            foreach ($product_bill_detail as $product)
            {
                $product_id = $product->bid_product_id;
                $product_qty = $product->bid_product_quantity;

                $product_info = $this->productRepository->firstById($product_id);

                $array_bill[$bill_id]['product'][$product_id]['qty'] = $product_qty;
                $array_bill[$bill_id]['product'][$product_id]['name'] = $product_info->pro_name;
                $array_bill[$bill_id]['product'][$product_id]['price'] = $product_info->pro_price;
                $array_bill[$bill_id]['product'][$product_id]['sale'] = $product_info->pro_sale;
                $array_bill[$bill_id]['product'][$product_id]['image'] = $product_info->pro_image;
                $array_bill[$bill_id]['product'][$product_id]['promotion'] = $product_info->pro_promotion;
            }
        }
        return $array_bill;
    }

    public function updateStatusBill(Request $request, $id)
    {
        $data['bil_status'] = $request->get('status');

        $bill = $this->billRepository->firstById($id);

        if (!$bill) return $this->responseErrorNotFound();

        $this->billRepository->updateById($id, $data);

        return $this->responseSuccess([], trans('messages.update_success'), Response::HTTP_OK);
    }
}
