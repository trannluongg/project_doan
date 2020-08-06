<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 05/08/2020
 * Time: 22:37
 */

namespace App\Transformers\Producer;


use App\Models\Producers;
use App\Transformers\Transformer;

class ProducerTransformer extends Transformer
{
    public function transform(Producers $producers)
    {
        $data = [
            'id'                => $producers->id,
            'name'              => $producers->pro_name,
            'avatar'            => $producers->pro_avatar ? $producers->pro_avatar : '',
            'created_at'        => $producers->created_at ? $producers->created_at->toDateTimeString() : null,
            'updated_at'        => $producers->updated_at ? $producers->updated_at->toDateTimeString() : null,
        ];

        return $this->responseData($producers, $data);
    }

    function setRelations()
    {
    }
}
