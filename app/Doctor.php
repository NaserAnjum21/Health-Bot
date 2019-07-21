<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    //
    use Notifiable;

    protected $guard = 'doctor';

    protected $fillable = [
        'name', 'email', 'password', 'work_address', 'qualification', 'speciality', 'contact_no', 'visiting_hours', 'rate_sum', 'rate_count', 'profile_pic',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
