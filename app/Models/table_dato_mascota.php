<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class table_dato_mascota extends Model
{

    protected $table = 'table_datos_mascota';

    protected $fillable = [ // Campos que se pueden asignar masivamente
        'user_id',
        'nombre_mascota',
        'especie',
        'raza',
        'peso',
        'color',
        'edad',
    ];

    protected $hidden = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(table_user::class, 'user_id');
    }
    
    public function citas()
    {
        return $this->hasMany(table_cita::class, 'mascota_id');
    }
}
