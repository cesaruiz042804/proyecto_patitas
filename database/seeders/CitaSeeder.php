<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\table_cita;

use Carbon\Carbon;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        table_cita::create([
            'mascota_id' => 1,
            'consultation' => 'Vacunas',
            'event' => null,
            'start_date' => null,
            'end_date' => null,
            'status' => 'Scheduled',
        ]);
        
        table_cita::create([
            'mascota_id' => 2,
            'consultation' => 'Desinfección',
            'event' => null,
            'start_date' => null,
            'end_date' => null,
            'status' => 'Scheduled',
        ]);
        
        table_cita::create([
            'mascota_id' => 3,
            'consultation' => 'Baño',
            'event' => null,
            'start_date' => null,
            'end_date' => null,
            'status' => 'Scheduled',
        ]);
        
        table_cita::create([
            'mascota_id' => 4,
            'consultation' => 'Revisión',
            'event' => null,
            'start_date' => null,
            'end_date' => null,
            'status' => 'Scheduled',
        ]);
    }
}
