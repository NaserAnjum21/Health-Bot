<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    //
    protected $fillable = [
        'id', 'name', 'symptoms', 'causes', 'risk_factors'
    ];
}
