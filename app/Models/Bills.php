<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\SetField\BillField;

class Bills extends Model
{
    public $prefix = 'bil';
    protected $table = 'bills';

    public $fieldClass = BillField::class;
    public $fieldClass_v2   = \App\SetField\BillField::class;

    public $relationships = [
        'bill_user'         => User::class,
        'bill_detail'       => BillDetail::class
    ];

    protected $guarded = [];

    public function bill_user()
    {
        return $this->belongsTo(User::class, 'pro_producer');
    }

    public function bill_detail()
    {
        return $this->hasMany(BillDetail::class, 'bid_bill_id', 'id');
    }
}
