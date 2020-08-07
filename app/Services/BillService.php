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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BillService
{
    private $billRepository;
    private $billDetailRepository;

    public function __construct(BillRepositoryInterface $billRepository,
                                BillDetailRepositoryInterface $billDetailRepository)
    {
        $this->billRepository       = $billRepository;
        $this->billDetailRepository = $billDetailRepository;
    }

    public function order(Request $request)
    {
        $user_id = $request->get('id');
        $name    = $request->get('name');
        $phone   = $request->get('phone');
        $address = $request->get('address');

        $cart = Session::has('cart') ? Session::get('cart') : [];

        $data['bil_user']         = $user_id;
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
        }

        Session::forget('cart');
        Session::flush();

        return true;
    }
}
