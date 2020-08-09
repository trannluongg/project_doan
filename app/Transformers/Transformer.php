<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

abstract class Transformer extends TransformerAbstract
{
    protected $relations = [];

    public function responseData($model, $data = [])
    {
        if($model->relationsToArray())
        {
            $this->setRelations();
            $relations = $model->relationsToArray();
            unset($relations['pivot']);
            $data = $this->includeRelations($model, $data, $relations);
        }

        return array_filter($data, function($value) {
            return !is_null($value);
        });
    }

    abstract function setRelations();

    public function includeRelations($model, $data, $relations)
    {
        foreach ($relations as $relation => $relationData)
        {
            $transformClass = $this->relations[$relation];
            $transformer = new $transformClass();
            $data[$relation] = fractal($model->$relation, $transformer)->toArray();
        }

        return $data;
    }
}
