<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('table_users', function (Blueprint $table) {
            $table->id(); // Crea una columna de tipo entero autoincremental como clave primaria.
            $table->string('email')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula');
            $table->string('telefono');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_users');
    }
};

/*

Explicación de los campos:

id(): Crea una columna de tipo entero autoincremental como clave primaria.
string('nombre'): Crea una columna de tipo cadena para almacenar el nombre del usuario.
string('email')->unique(): Crea una columna de tipo cadena para almacenar el correo electrónico del usuario, asegurando que sea único.
string('password'): Crea una columna de tipo cadena para almacenar la contraseña del usuario.
string('telefono')->nullable(): Crea una columna de tipo cadena para almacenar el número de teléfono del usuario, permitiendo valores nulos.
timestamps(): Agrega las columnas created_at y updated_at para registrar la fecha y hora de creación y actualización del registro.

*/