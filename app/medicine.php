<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    //
    protected $fillable = [
        'id', 'trade_name', 'generic_name', 'cost', 'side_effects', 'precautions'
    ];
}
