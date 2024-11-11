<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('table_datos_mascota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('table_users')->onDelete('cascade'); // Asegúrate de que apunte a 'table_users'
            $table->string('nombre_mascota');
            $table->string('especie');
            $table->string('raza');
            $table->double('peso');
            $table->string('color');
            $table->integer('edad');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_datos_mascota');
    }
};

/*

Explicación de los campos:
id(): Identificador único de cada mascota.
foreignId('user_id')->constrained()->onDelete('cascade'): Establece una relación con la tabla "users" a través de la clave foránea user_id. Si se elimina un usuario, se eliminarán automáticamente todas sus mascotas.
nombre_mascota, especie, raza: Campos para almacenar el nombre, especie y raza de la mascota.
fecha_nacimiento: Campo para almacenar la fecha de nacimiento de la mascota.
observaciones: Campo para almacenar notas adicionales sobre la mascota.
timestamps(): Registra la fecha y hora de creación y actualización de cada registro.

*/