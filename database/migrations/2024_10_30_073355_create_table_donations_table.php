<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_donations', function (Blueprint $table) {
            $table->id(); // ID auto-incremental
            $table->string('donor_name')->nullable(); // Nombre del donante (opcional)
            $table->decimal('amount', 8, 2); // Monto de la donación
            $table->string('email')->nullable(); // Email del donante (opcional)
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_donations');
    }
};
