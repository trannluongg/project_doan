<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 21:48
 */

namespace Modules\Admin\SetField;


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
