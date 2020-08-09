<?php

namespace App\GatewaySetField;

trait SetFieldTrait
{
    public function getField($fieldClass)
    {
        if($fieldClass instanceof SetFieldAbstract)
        {
            return $fieldClass->getField();
        }
        return [];
    }

    public function getFieldPrefix($fieldClass, $prefix)
    {
        if($fieldClass instanceof SetFieldAbstract)
        {
            return $fieldClass->getFieldPrefix($prefix);
        }
        return [];
    }
}
