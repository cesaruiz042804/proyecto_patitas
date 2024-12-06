<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class table_admin_user extends Model
{
    protected $table = 'table_admin_users';

    protected $fillable = [ // Campos que se pueden asignar masivamente
        'email',
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'password',
    ];

    protected $hidden = [
        'email',
        'telefono',
        'password', // Oculta la contraseña cuando el modelo es transformado a JSON
    ];
}
