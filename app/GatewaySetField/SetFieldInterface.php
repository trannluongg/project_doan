<?php

namespace App\GatewaySetField;

interface SetFieldInterface
{
    public function getField();
    public function getFieldPrefix($prefix);
}