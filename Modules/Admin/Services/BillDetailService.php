<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 23:04
 */

namespace Modules\Admin\Services;


use App\Service\BaseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Repository\Bill\BillRepositoryInterface;
use Modules\Admin\Repository\BillDetail\BillDetailRepositoryInterface;
use Modules\Admin\Repository\Product\ProductRepositoryInterface;
use Modules\Admin\Transformers\Bill\BillTransformer;
use Modules\Admin\Transformers\BillDetail\BillDetailTransformer;

class BillDetailService extends BaseService
{
    private $billDetailRepository;
    private $productRepository;
    private $billRepository;

    public function __construct(BillDetailRepositoryInterface $billDetailRepository,
                                ProductRepositoryInterface $productRepository,
                                BillRepositoryInterface $billRepository)
    {
        $this->billDetailRepository = $billDetailRepository;
        $this->productRepository = $productRepository;
        $this->billRepository =  $billRepository;
    }

    public function create(Request $request)
    {

    }

    public function getList(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit(Request $request, $id)
    {

    }

    public function getBillDetailId($id)
    {
        $bill_detail = $this->billDetailRepository->getBillDetailId($id);

        $bill = $this->billRepository->firstById($id);

        $bills = [];

        $bills['id'] = $bill->id;
        $bills['sum_money'] = $bill->bil_sum_money;

        foreach ($bill_detail as $bill_d)
        {
            $product_id = $bill_d->bid_product_id;

            $product = $this->productRepository->firstById($product_id);

            $bills['bill'][$product_id]['qty'] = $bill_d->bid_product_quantity;
            $bills['bill'][$product_id]['item']['id'] = $product->id;
            $bills['bill'][$product_id]['item']['total'] = $product->pro_total;
            $bills['bill'][$product_id]['item']['name'] = $product->pro_name;
            $bills['bill'][$product_id]['item']['image'] = explode('|', $product->pro_image);
            $bills['bill'][$product_id]['item']['price'] = $product->pro_price;
            $bills['bill'][$product_id]['item']['sale'] = $product->pro_sale;
            $bills['bill'][$product_id]['item']['promotion'] = $product->pro_promotion;
        }

        return response()->json($bills, Response::HTTP_OK);
    }

    public function updateBillDetail(Request $request)
    {
        $product_id     = $request->get('product_id');
        $bill_id        = $request->get('bill_id');
        $product_qty    = $request->get('product_qty');

        $bill = $this->billRepository->firstById($bill_id);

        $sum_money_bill_current = $bill->bil_sum_money;

        $bill_detail = $this->billDetailRepository->getBillDetailWithBillIdProId($bill_id, $product_id);

        $bill_detail = $bill_detail[0];

        $sum_money_bill_now = $sum_money_bill_current -
                                ($bill_detail->bid_product_quantity * $bill_detail->bid_product_price) +
                                ($product_qty * $bill_detail->bid_product_price);

        $data_bill_update['bil_sum_money'] = $sum_money_bill_now;

        $this->billRepository->updateById($bill_id, $data_bill_update);

        $data_bill_detail_update['bid_product_quantity'] = $product_qty;

        $this->billDetailRepository->updateBillDetailWithBillIdProId($bill_id, $product_id, $data_bill_detail_update);

        $product = $this->productRepository->firstById($product_id);

        $product_total = $product->pro_total;

        $product_total_now = $product_total + $bill_detail->bid_product_quantity -  $product_qty;

        $data_product_update['pro_total'] = $product_total_now;

        $this->productRepository->updateById($product_id, $data_product_update);

        $bill_now = $this->billRepository->firstById($bill_id);

        $data = $this->fractalTransformerData($bill_now, BillTransformer::class);

        return $this->responseSuccess(['data' => $data]);
    }


    public function removeProductBillDetail(Request $request)
    {
        $product_id     = $request->get('product_id');
        $bill_id        = $request->get('bill_id');

        $bill = $this->billRepository->firstById($bill_id);

        $sum_money_bill_current = $bill->bil_sum_money;

        $bill_detail = $this->billDetailRepository->getBillDetailWithBillIdProId($bill_id, $product_id);

        $bill_detail = $bill_detail[0];

        $sum_money_bill_now = $sum_money_bill_current - ($bill_detail->bid_product_quantity * $bill_detail->bid_product_price);

        $data_bill_update['bil_sum_money'] = $sum_money_bill_now;

        $this->billRepository->updateById($bill_id, $data_bill_update);

        $this->billDetailRepository->deleteBillDetailWithBillIdProId($bill_id, $product_id);

        $product = $this->productRepository->firstById($product_id);

        $product_total = $product->pro_total;

        $product_total_now = $product_total + $bill_detail->bid_product_quantity;

        $data_product_update['pro_total'] = $product_total_now;

        $this->productRepository->updateById($product_id, $data_product_update);

        $bill_now = $this->billRepository->firstById($bill_id);

        $data = $this->fractalTransformerData($bill_now, BillTransformer::class);

        return $this->responseSuccess(['data' => $data]);
    }
}
