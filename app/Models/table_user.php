<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class table_user extends Model
{

    protected $table = 'table_users';

    protected $fillable = [ // Campos que se pueden asignar masivamente
        'user_id',
        'email',
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'password',
    ];

    protected $hidden = [
        'user_id',
        'email',
        'telefono',
        'password', // Oculta la contraseña cuando el modelo es transformado a JSON
        'remember_token',
    ];
}

/*

$fillable: Especifica los campos que pueden ser asignados masivamente. 
Estos deben coincidir con los nombres de los campos que estás enviando en el controlador: 
'email', 'nombre', 'apellido', 'cedula', 'telefono', 'password'.

*/