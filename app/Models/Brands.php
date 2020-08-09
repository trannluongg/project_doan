<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\SetField\BrandField;

class Brands extends Model
{
    public $prefix = 'bra';
    protected $table = 'brands';

    public $fieldClass = BrandField::class;
    public $fieldClass_v2   = \App\SetField\BrandField::class;

    public $relationships = [
        'brand_products'           => Products::class
    ];

    protected $guarded = [];

    public function brand_products()
    {
        return $this->hasMany(Products::class, 'pro_brand');
    }
}
