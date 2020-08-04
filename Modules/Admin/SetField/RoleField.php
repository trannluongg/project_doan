<?php

namespace Modules\Admin\SetField;

use App\GatewaySetField\SetFieldAbstract;

class RoleField extends SetFieldAbstract
{
    protected $defaultField = [
        'id',
        'name',
        'guard_name',
        'identifier_name',
        'description',
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
