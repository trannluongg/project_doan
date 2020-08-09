<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 8/8/2020
 * Time: 2:39 PM
 */

namespace App\SetField;


use App\GatewaySetField\SetFieldAbstract;

class BillDetailField extends SetFieldAbstract
{
    protected $defaultField = [
        'bill_id',
        'product_id',
        'product_price',
        'product_quantity',
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
