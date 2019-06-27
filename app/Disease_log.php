<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease_log extends Model
{
    //
    protected $fillable = [
        'id', 'presciption_id', 'disease_id', 'diagnosis_date'
    ];
}
