<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/3/2020
 * Time: 4:49 PM
 */

namespace Modules\Admin\Transformers\Role;


use App\Models\Role;
use App\Transformers\Transformer;
use Modules\Admin\Transformers\Permission\PermissionTransformer;

class RoleTransformer extends Transformer
{
    public function transform(Role $role)
    {
        $data = [
            'id'                => $role->id,
            'name'              => $role->name,
            'guard_name'        => $role->guard_name,
            'identifier_name'   => $role->identifier_name,
            'description'       => $role->description,
            'created_at'        => $role->created_at ? $role->created_at->toDateTimeString() : null,
            'updated_at'        => $role->updated_at ? $role->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($role, $data);
    }

    public function setRelations()
    {
        $this->relations = [
            'permissions' => PermissionTransformer::class
        ];
    }
}
