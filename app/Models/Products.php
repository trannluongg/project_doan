<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\SetField\ProductField;

class Products extends Model
{
    public $prefix = 'pro';
    protected $table = 'products';

    public $fieldClass      = ProductField::class;
    public $fieldClass_v2   = \App\SetField\ProductField::class;

    public $relationships = [
        'producers'     => Producers::class,
        'brands'        => Brands::class,
        'category'      => Category::class
    ];

    protected $guarded = [];

    public function producers()
    {
        return $this->belongsTo(Producers::class, 'pro_producer');
    }

    public function brands()
    {
        return $this->belongsTo(Brands::class, 'pro_brand');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_category');
    }
}
