<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/4/2020
 * Time: 2:52 PM
 */

namespace Modules\Admin\SetField;


use App\GatewaySetField\SetFieldAbstract;

class ModuleGroupField extends SetFieldAbstract
{
    protected $defaultField = [
        'id',
        'name',
        'order',
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
