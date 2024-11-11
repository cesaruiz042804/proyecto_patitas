<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class table_email_confirmation extends Model
{
    protected $table = 'table_email_confirmations';

    protected $fillable = [ // Campos que se pueden asignar masivamente
        'email',
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'password',
        'token',
    ];

    protected $hidden = [
        'email',
        'telefono',
        'password', // Oculta la contraseña cuando el modelo es transformado a JSON
        'remember_token',
    ];
}
