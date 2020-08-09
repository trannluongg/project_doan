<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:06
 */

namespace App\Transformers\Brand;


use App\Models\Brands;
use App\Transformers\Transformer;

class BrandTransformer extends Transformer
{
    public function transform(Brands $brands)
    {
        $data = [
            'id'                => $brands->id,
            'name'              => $brands->bra_name,
            'icon'              => $brands->bra_icon,
            'slug'              => $brands->bra_slug,
            'created_at'        => $brands->created_at ? $brands->created_at->toDateTimeString() : null,
            'updated_at'        => $brands->updated_at ? $brands->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($brands, $data);
    }
    function setRelations()
    {
    }
}
