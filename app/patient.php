<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
    // 'address', 'height', 'weight', 'bloodgroup', 'bloodpressure',
    use Notifiable;

    protected $guard = 'patient';

    protected $fillable = [
        'name', 'email', 'password', 'address', 'height', 'weight', 'bloodgroup', 'bloodpressure', 'profile_pic', 'contact_no',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
