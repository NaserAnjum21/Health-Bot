<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    // 'address', 'height', 'weight', 'bloodgroup', 'bloodpressure',
    use Notifiable;

    protected $guard = 'patient';

    protected $fillable = [
        'name', 'email', 'password', 'address', 'height', 'weight', 'bloodgroup', 'bloodpressure',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
