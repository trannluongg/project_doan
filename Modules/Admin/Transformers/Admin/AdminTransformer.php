<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 10/3/2020
 * Time: 10:58 AM
 */

namespace Modules\Admin\Transformers\Admin;

use App\Models\Admins;
use App\Transformers\Transformer;
use Carbon\Carbon;
use Modules\Admin\Transformers\Permission\PermissionTransformer;
use Modules\Admin\Transformers\Role\RoleTransformer;

class AdminTransformer extends Transformer
{
    public function transform(Admins $admin)
    {
        $data = [
            'id'            => $admin->id,
            'email'         => $admin->email,
            'name'          => $admin->name,
            'phone'         => $admin->phone,
            'date_of_birth' => $admin->date_of_birth,
            'age'           => $admin->date_of_birth ? Carbon::parse(Carbon::createFromFormat('d/m/Y', $admin->date_of_birth)->format('Y-m-d'))->age : null,
            'gender'        => $admin->gender,
            'status'        => $admin->status,
            'address'       => $admin->address,
            'priority'      => $admin->priority,
            'avatar'        => $admin->avatar ? 'http://doan.abc/upload/avatar/' . $admin->avatar : null,
            'created_at'    => $admin->created_at ? $admin->created_at->toDateTimeString() : null,
            'updated_at'    => $admin->updated_at ? $admin->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($admin, $data);
    }

    public function setRelations()
    {
        $this->relations = [
            'roles_admin' => RoleTransformer::class,
            'permissions_admin' => PermissionTransformer::class
        ];
    }
}
