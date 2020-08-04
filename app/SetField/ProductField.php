<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 20:06
 */

namespace App\SetField;


use App\GatewaySetField\SetFieldAbstract;

class ProductField extends SetFieldAbstract
{
    protected $defaultField = [
        'id',
        'name',
        'price',
        'sale',
        'image',
        'description',
        'promotion',
        'total',
        'brand',
        'producer',
        'category',
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
