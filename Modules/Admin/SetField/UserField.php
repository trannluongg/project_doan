<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 21:55
 */

namespace Modules\Admin\SetField;


use App\GatewaySetField\SetFieldAbstract;

class UserField extends SetFieldAbstract
{
    protected $defaultField = [
        'id',
        'id_sub',
        'name',
        'email',
        'password',
        'address',
        'phone',
        'avatar',
        'gender',
        'date_of_birth',
        'status',
        'driver',
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
