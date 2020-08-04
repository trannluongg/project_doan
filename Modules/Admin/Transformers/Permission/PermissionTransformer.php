<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/3/2020
 * Time: 11:20 AM
 */

namespace Modules\Admin\Transformers\Permission;


use App\Models\Permission;
use App\Transformers\Transformer;


class PermissionTransformer extends Transformer
{
    public function transform(Permission $permission)
    {
        $data = [
            'id'                => $permission->id,
            'name'              => $permission->name,
            'guard_name'        => $permission->guard_name,
            'identifier_name'   => $permission->identifier_name,
            'description'       => $permission->description,
            'module_id'         => $permission->module_id ?? '',
            'created_at'        => $permission->created_at ? $permission->created_at->toDateTimeString() : null,
            'updated_at'        => $permission->updated_at ? $permission->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($permission, $data);
    }

    public function setRelations()
    {

    }
}
