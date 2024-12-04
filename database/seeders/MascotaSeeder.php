<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\table_dato_mascota;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        table_dato_mascota::create([
            'user_id' => 1,
            'nombre_mascota' => 'Lucas',
            'especie' => 'perro',
            'raza' => 'labrador',
            'peso' => 30.5,
            'color' => 'marrón',
            'edad' => 5,
        ]);
        
        table_dato_mascota::create([
            'user_id' => 1,
            'nombre_mascota' => 'Luna',
            'especie' => 'gato',
            'raza' => 'siamés',
            'peso' => 4.2,
            'color' => 'blanco',
            'edad' => 3,
        ]);

        table_dato_mascota::create([
            'user_id' => 2,
            'nombre_mascota' => 'Minnie',
            'especie' => 'gato',
            'raza' => 'persa',
            'peso' => 4,
            'color' => 'blanco',
            'edad' => 2,
        ]);
        
        table_dato_mascota::create([
            'user_id' => 3,
            'nombre_mascota' => 'Nemo',
            'especie' => 'pez',
            'raza' => 'payaso',
            'peso' => 0.2,
            'color' => 'naranja y blanco',
            'edad' => 0.5,
        ]);
    }
}
