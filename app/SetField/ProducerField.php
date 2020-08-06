<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 05/08/2020
 * Time: 22:32
 */

namespace App\SetField;


use App\GatewaySetField\SetFieldAbstract;

class ProducerField extends SetFieldAbstract
{

    protected $defaultField = [
        'id',
        'name',
        'avatar',
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
