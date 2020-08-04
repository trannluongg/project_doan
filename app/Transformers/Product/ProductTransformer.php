<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:04
 */

namespace App\Transformers\Product;


use App\Models\Products;
use App\Transformers\Transformer;

class ProductTransformer extends Transformer
{
    public function transform(Products $products)
    {
        $data = [
            'id'                => $products->id,
            'price'             => $products->pro_price,
            'name'              => $products->pro_name,
            'sale'              => $products->pro_sale,
            'total'             => $products->pro_total,
            'image'             => $this->images($products->pro_image),
            'description'       => $products->pro_description,
            'promotion'         => $products->pro_promotion,
            'brand'             => $products->pro_brand,
            'producer'          => $products->pro_producer,
            'category'          => $products->pro_category
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
                $img = $image;
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

    }
}
