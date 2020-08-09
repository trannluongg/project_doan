<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1/4/2020
 * Time: 3:25 PM
 */

namespace Modules\Admin\Transformers\ModuleGroup;


use App\Models\ModuleGroup;
use App\Transformers\Transformer;
use Modules\Admin\Transformers\Module\ModuleTransformer;

class ModuleGroupTransformer extends Transformer
{
    public function transform(ModuleGroup $moduleGroup)
    {
        $data = [
            'id'                => $moduleGroup->id,
            'name'              => $moduleGroup->mog_name,
            'order'             => $moduleGroup->mog_order,
            'created_at'        => $moduleGroup->created_at ? $moduleGroup->created_at->toDateTimeString() : null,
            'updated_at'        => $moduleGroup->updated_at ? $moduleGroup->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($moduleGroup, $data);
    }

    public function setRelations()
    {
        $this->relations = [
            'modules_group' => ModuleTransformer::class
        ];
    }
}
