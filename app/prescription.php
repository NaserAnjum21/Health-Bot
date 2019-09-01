<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    //
    protected $fillable = [
        'id', 'patient_id', 'doctor_id', 'time', 'next_visit_date', 'symptoms', 'directions'
    ];

    public function medicine_logs()
    {
        return $this->hasMany('App\medicine_log');
    }

    public function disease_logs()
    {
        return $this->hasMany('App\Disease_log');
    }

}
