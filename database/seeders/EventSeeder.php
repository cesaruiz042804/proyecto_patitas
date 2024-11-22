<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'event' => 'Cita #1',
                'start_date' => '2024-11-25 08:30', // Lunes
                'end_date' => '2024-11-25 09:00',
            ],
            [
                'event' => 'Cita #2',
                'start_date' => '2024-11-25 09:30', // Lunes
                'end_date' => '2024-11-25 10:30',
            ],
            [
                'event' => 'Cita #3',
                'start_date' => '2024-11-26 11:00', // Martes
                'end_date' => '2024-11-26 11:30',
            ],
            [
                'event' => 'Cita #4',
                'start_date' => '2024-11-27 14:00', // Miércoles
                'end_date' => '2024-11-27 14:30',
            ],
            [
                'event' => 'Cita #5',
                'start_date' => '2024-11-28 13:30', // Jueves
                'end_date' => '2024-11-28 14:00',
            ],
            [
                'event' => 'Cita #6',
                'start_date' => '2024-12-02 08:00', // Lunes
                'end_date' => '2024-12-02 09:00',
            ],
            [
                'event' => 'Cita #7',
                'start_date' => '2024-12-04 10:00', // Miércoles
                'end_date' => '2024-12-04 11:00',
            ],
            [
                'event' => 'Cita #8',
                'start_date' => '2024-12-09 15:00', // Lunes
                'end_date' => '2024-12-09 16:00',
            ],
            [
                'event' => 'Cita #9',
                'start_date' => '2024-12-16 13:00', // Lunes
                'end_date' => '2024-12-16 14:00',
            ],
            [
                'event' => 'Cita #10',
                'start_date' => '2024-12-19 09:00', // Jueves
                'end_date' => '2024-12-19 10:00',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
