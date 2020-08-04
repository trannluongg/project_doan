<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:05
 */

namespace Modules\Admin\Transformers\Category;


use App\Models\Category;
use App\Transformers\Transformer;
use Modules\Admin\Transformers\Product\ProductTransformer;

class CategoryTransformer extends Transformer
{
    public function transform(Category $category)
    {
        $data = [
            'id'                => $category->id,
            'name'              => $category->cat_name,
            'created_at'        => $category->created_at ? $category->created_at->toDateTimeString() : null,
            'updated_at'        => $category->updated_at ? $category->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($category, $data);
    }

    function setRelations()
    {
        $this->relations = [
            'category_products'           => ProductTransformer::class
        ];
    }
}
