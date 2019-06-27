<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
        'id', 'doctor_id', 'patient_id', 'time', 'additional_directions'
    ];
}
