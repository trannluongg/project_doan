<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:04
 */

namespace Modules\Admin\Transformers\Product;


use App\Models\Products;
use App\Transformers\Transformer;
use Modules\Admin\Transformers\Brand\BrandTransformer;
use Modules\Admin\Transformers\Category\CategoryTransformer;
use Modules\Admin\Transformers\Producer\ProducerTransformer;

class ProductTransformer extends Transformer
{
    public function transform(Products $products)
    {
        $data = [
            'id'                => $products->id,
            'name'              => $products->pro_name,
            'price'             => $products->pro_price,
            'sale'              => $products->pro_sale,
            'total'             => $products->pro_total,
            'image'             => $this->images($products->pro_image),
            'description'       => $products->pro_description,
            'promotion'         => $products->pro_promotion,
            'brand'             => $products->pro_brand,
            'producer'          => $products->pro_producer,
            'category'          => $products->pro_category,
            'created_at'        => $products->created_at ? $products->created_at->toDateTimeString() : null,
            'updated_at'        => $products->updated_at ? $products->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($products, $data);
    }


    public function images($images = '')
    {
        $arr_images_new = [];

        if ($images != '')
        {
            $arr_images     = explode('|', $images);

            foreach ($arr_images as $image)
            {
                $img = config('doan.domain') . '/upload/product/' . $image;
                $arr_images_new[] = $img;
            }
        }
        else{
            $arr_images_new = [];
        }

        return $arr_images_new;
    }
    function setRelations()
    {
        $this->relations = [
            'producers'     => ProducerTransformer::class,
            'brands'        => BrandTransformer::class,
            'category'      => CategoryTransformer::class
        ];
    }
}
