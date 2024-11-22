<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class table_cita extends Model
{

    protected $table = 'table_cita';

    protected $fillable = [ // Campos que se pueden asignar masivamente
        'user_id',
        'event',
        'start_date',
        'end_date',
        'consultation',
    ];

    protected $hidden = [
        'user_id',
        'consultation'
    ];
}
