<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 20:03
 */

namespace Modules\Admin\SetField;


use App\GatewaySetField\SetFieldAbstract;

class BrandField extends SetFieldAbstract
{
    protected $defaultField = [
        'id',
        'name',
        'icon',
        'slug',
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
