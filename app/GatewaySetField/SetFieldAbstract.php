<?php

namespace App\GatewaySetField;

use App\Core123\Helper\DataHelper;

abstract class SetFieldAbstract implements SetFieldInterface
{
    protected $prefix = '';

    abstract public function user();
    abstract public function admin();
    abstract public function guest();

    public function getField()
    {
        $field = [];

        if(!\Auth::user()) $field = $this->guest();

        if(\Auth::guard('users')->user()) $field = $this->user();

        if(\Auth::guard('admins')->user()) $field = $this->admin();

        return $field ?: ['id'];
    }

    public function getFieldPrefix($prefix)
    {
        return (new DataHelper())->convertAddPrefix($prefix, $this->getField());
    }

    public function getPrefix()
    {
        return $this->prefix;
    }
}
