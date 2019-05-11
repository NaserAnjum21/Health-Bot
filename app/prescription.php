<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    //
    protected $fillable = [
        'id', 'name', 'patient_id', 'doctor_id', 'medicine', 'details', 'next_visit_date'
    ];
}
