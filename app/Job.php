<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'active', 'payment','payment_type','transaction_id'
    ];
}
