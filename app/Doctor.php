<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    //
    use Notifiable;

    protected $guard = 'doctor';

    protected $fillable = [
        'name', 'email', 'password', 'work_address', 'qualification', 'speciality', 'contact_no', 'visiting_hours','rate_sum','rate_count'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

