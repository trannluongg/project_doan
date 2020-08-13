<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\SetField\BillDetailField;

class BillDetail extends Model
{
    public $prefix = 'bid';
    protected $table = 'bill_details';

    public $fieldClass = BillDetailField::class;
    public $fieldClass_v2   = \App\SetField\BillDetailField::class;

    protected $guarded = [];

    public function bill_products()
    {
        $this->hasMany(Products::class, 'bid_product_id');
    }
}
