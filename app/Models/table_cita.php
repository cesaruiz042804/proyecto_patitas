<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class table_cita extends Model
{

    protected $table = 'table_cita';

    protected $fillable = [ // Campos que se pueden asignar masivamente
        'mascota_id',
        'consultation',
        'event',
        'start_date',
        'end_date',
        'status',
    ];

    protected $hidden = [
        'mascota_id',
        'consultation',
        'event',
        'start_date',
        'end_date',
        'status',
    ];

    public function mascota() // Esto ayuda a crear una relación entre tablas
    {
        return $this->belongsTo(table_dato_mascota::class, 'mascota_id');
    }
}
