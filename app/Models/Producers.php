<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\SetField\ProducersFiled;

class Producers extends Model
{
    public $prefix = 'pro';
    protected $table = 'producers';

    public $fieldClass = ProducersFiled::class;

    public $relationships = [
        'producer_products'           => Products::class
    ];

    protected $guarded = [];

    public function producer_products()
    {
        return $this->hasMany(Products::class, 'pro_producer');
    }
}
