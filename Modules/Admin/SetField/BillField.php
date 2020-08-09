<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 20:11
 */

namespace Modules\Admin\SetField;


use App\GatewaySetField\SetFieldAbstract;

class BillField extends SetFieldAbstract
{
    protected $defaultField = [
        'id',
        'user',
        'username',
        'user_address',
        'user_phone',
        'sum_money',
        'status',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return [];
    }

    public function admin()
    {
        return $this->defaultField;
    }

    public function guest()
    {
        return [];
    }
}
