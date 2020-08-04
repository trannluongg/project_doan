<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:06
 */

namespace Modules\Admin\Transformers\Bill;


use App\Models\Bills;
use App\Transformers\Transformer;
use Modules\Admin\Transformers\BillDetail\BillDetailTransformer;
use Modules\Admin\Transformers\User\UserTransformer;

class BillTransformer extends Transformer
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
            'bill_user'         => UserTransformer::class,
            'bill_detail'       => BillDetailTransformer::class
        ];
    }
}
