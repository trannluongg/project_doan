<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 20:03
 */

namespace App\SetField;


use App\GatewaySetField\SetFieldAbstract;

class BrandField extends SetFieldAbstract
{
    protected $defaultField = [
        'id',
        'name',
        'slug',
        'icon',
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
