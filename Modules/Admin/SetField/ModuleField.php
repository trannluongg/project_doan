<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 25/3/2020
 * Time: 1:52 PM
 */

namespace Modules\Admin\SetField;


use App\GatewaySetField\SetFieldAbstract;

class ModuleField extends SetFieldAbstract
{
    protected $defaultField = [
        'id',
        'name',
        'icon',
        'permission',
        'order',
        'menu',
        'menu_route',
        'menu_permission',
        'module_group_id',
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
