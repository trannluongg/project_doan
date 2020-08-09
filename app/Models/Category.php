<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\SetField\CategoryField;

class Category extends Model
{
    public $prefix = 'cat';
    protected $table = 'category';

    public $fieldClass = CategoryField::class;

    public $relationships = [
        'category_products'           => Products::class
    ];

    protected $guarded = [];

    public function category_products()
    {
        return $this->hasMany(Products::class, 'pro_category');
    }
}
