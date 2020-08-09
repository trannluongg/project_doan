<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 06/08/2020
 * Time: 20:07
 */

namespace App\Repository\BillDetail;


use App\Core123\EloquentRepository;
use App\Models\BillDetail;

class BillDetailRepository extends EloquentRepository implements BillDetailRepositoryInterface
{
    public function __construct(BillDetail $billDetail)
    {
        $this->model = $billDetail;
    }

    public function getBillDetailWithBillId($bill_id = null)
    {
        return $this->model->where('bid_bill_id', $bill_id)->get(['bid_product_id','bid_product_quantity']);
    }
}
