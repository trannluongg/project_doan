<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 8/8/2020
 * Time: 2:24 PM
 */

namespace App\Transformers\Bill;


use App\Models\Bills;
use App\Transformers\Transformer;

class BillTransformer  extends Transformer
{
    public function transform(Bills $bills)
    {
        $data = [
            'id'                => $bills->id,
            'user'              => $bills->user,
            'username'          => $bills->username,
            'user_address'      => $bills->user_address,
            'user_phone'        => $bills->user_phone,
            'sum_money'         => $bills->sum_money,
            'status'            => $bills->status,
            'created_at'        => $bills->created_at ? $bills->created_at->toDateTimeString() : null,
            'updated_at'        => $bills->updated_at ? $bills->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($bills, $data);
    }

    function setRelations()
    {
        $this->relations = [
            'bill_detail'       => BillDetailTransformer::class
        ];
    }
}

