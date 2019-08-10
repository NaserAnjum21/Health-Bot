<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_post extends Model
{
    //
    protected $fillable = [
        'id', 'image', 'title', 'point1', 'point2', 'point3', 'point4'
    ];
}
