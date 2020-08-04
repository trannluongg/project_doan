<?php

namespace App\Core123;

trait HelperCondition
{
    public function setRelationshipCondition($relation, $relationship)
    {
        if (is_string($relation))
        {
            $relation_array = explode(',', $relation);
        }
        $result = [];
        foreach ($relation_array as $i => $item)
        {
            $result[$i] = [
                'name'  => $item,
                'field' => $relationship[$item] ?? ['*'],
            ];
        }
        return $result;
    }
}
