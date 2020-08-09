<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 8/8/2020
 * Time: 2:24 PM
 */

namespace App\Transformers\Bill;


use App\Models\BillDetail;
use App\Transformers\Transformer;

class BillDetailTransformer extends Transformer
{
    public function transform(BillDetail $billDetail)
    {
        $data = [
            'bill_id'           => $billDetail->bill_id,
            'product_id'        => $billDetail->product_id,
            'product_price'     => $billDetail->product_price,
            'product_quantity'  => $billDetail->product_quantity,
            'created_at'        => $billDetail->created_at ? $billDetail->created_at->toDateTimeString() : null,
            'updated_at'        => $billDetail->updated_at ? $billDetail->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($billDetail, $data);
    }

    function setRelations()
    {

    }
}
