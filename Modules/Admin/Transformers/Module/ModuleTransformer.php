<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 22/3/2020
 * Time: 10:38 PM
 */

namespace Modules\Admin\Transformers\Module;


use App\Models\Module;
use App\Transformers\Transformer;
use Modules\Admin\Transformers\ModuleGroup\ModuleGroupTransformer;
use Modules\Admin\Transformers\Permission\PermissionTransformer;

class ModuleTransformer extends Transformer
{
    public function transform(Module $module)
    {
        $data = [
            'id'                => $module->id,
            'name'              => $module->mod_name,
            'icon'              => $module->mod_icon,
            'order'             => $module->mod_order,
            'permission'        => $module->mod_permission,
            'menu'              => json_decode($module->mod_menu, true),
            'menu_route'        => json_decode($module->mod_menu_route, true),
            'menu_permission'   => json_decode($module->mod_menu_permission, true),
            'module_group'      => $module->mod_module_group_id,
            'created_at'        => $module->created_at ? $module->created_at->toDateTimeString() : null,
            'updated_at'        => $module->updated_at ? $module->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($module, $data);
    }

    public function setRelations()
    {
        $this->relations = [
            'module_permissions'    => PermissionTransformer::class,
            'modules'               => ModuleGroupTransformer::class
        ];
    }
}
