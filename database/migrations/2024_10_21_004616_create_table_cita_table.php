<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('table_cita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('table_users')->onDelete('cascade'); // Asegúrate de que apunte a 'table_users'
            $table->date('fecha_cita');
            $table->time('hora_cita');
            $table->string('motivo_consulta');
            $table->string('imagen');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_cita');
    }
};

/*

Explicación de los cambios:
foreignId('user_id')->constrained()->onDelete('cascade'):
Esta línea crea una clave foránea que vincula la tabla "citas" con la tabla "users" (asumiendo que tienes una tabla de usuarios).
constrained() asegura que el valor de user_id exista en la tabla "users".
onDelete('cascade') indica que si se elimina un usuario, se eliminarán automáticamente todas las citas asociadas a ese usuario.
enum('estado_cita', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente'):
Define un campo de tipo enumeración para el estado de la cita, con los valores posibles y establece "pendiente" como valor por defecto.
timestamps():
Agrega automáticamente los campos created_at y updated_at para registrar la fecha y hora de creación y actualización de cada cita.

*/