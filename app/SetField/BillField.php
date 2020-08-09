<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 8/8/2020
 * Time: 2:39 PM
 */

namespace App\SetField;


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
        return $this->defaultField;
    }

    public function admin()
    {
        return $this->defaultField;
    }

    public function guest()
    {
        return $this->defaultField;
    }
}
