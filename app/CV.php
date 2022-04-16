<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $fillable = [
        'payment_type', 'transaction_id', 'total_cost','active'
    ];
}
