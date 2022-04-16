<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCV extends Model
{
    protected $fillable = [
        'cover_letter', 'cv'
    ];
}
