<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class table_cita extends Model
{

    protected $table = 'table_cita';

    protected $fillable = [ // Campos que se pueden asignar masivamente
        'user_id',
        'fecha_cita',
        'hora_cita',
        'motivo_consulta',
        'imagen',
    ];

    protected $hidden = [
        'user_id',
        'imagen',
    ];
}
