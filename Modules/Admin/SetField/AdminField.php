<?php

namespace Modules\Admin\SetField;

use App\GatewaySetField\SetFieldAbstract;

class AdminField extends SetFieldAbstract
{
    protected $defaultField = [
        'id',
        'name',
        'email',
        'status',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'avatar',
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
