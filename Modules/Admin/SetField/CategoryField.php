<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 20:04
 */

namespace Modules\Admin\SetField;


use App\GatewaySetField\SetFieldAbstract;

class CategoryField extends SetFieldAbstract
{
    protected $defaultField = [
        'id',
        'name',
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
