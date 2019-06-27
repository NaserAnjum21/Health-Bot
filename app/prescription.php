<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    //
    protected $fillable = [
        'id', 'patient_id', 'doctor_id', 'time', 'next_visit_date', 'symptoms', 'directions'
    ];
}
