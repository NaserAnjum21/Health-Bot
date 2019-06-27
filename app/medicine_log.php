<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicine_log extends Model
{
    //
    protected $fillable = [
        'id', 'prescription_id', 'medicine_id', 'dose', 'frequency', 'course_duration', 'instructions'
    ];
}
