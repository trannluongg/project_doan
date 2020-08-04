<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 22/06/2020
 * Time: 22:05
 */

namespace Modules\Admin\Transformers\Producer;


use App\Models\Producers;
use App\Transformers\Transformer;
use Modules\Admin\Transformers\Product\ProductTransformer;

class ProducerTransformer extends Transformer
{
    public function transform(Producers $producers)
    {
        $data = [
            'id'                => $producers->id,
            'name'              => $producers->pro_name,
            'avatar'            => $producers->pro_avatar ? 'http://localhost:8000/upload/producer/' . $producers->pro_avatar : '',
            'created_at'        => $producers->created_at ? $producers->created_at->toDateTimeString() : null,
            'updated_at'        => $producers->updated_at ? $producers->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($producers, $data);
    }

    function setRelations()
    {
        $this->relations = [
            'producer_products'           => ProductTransformer::class
        ];
    }
}
