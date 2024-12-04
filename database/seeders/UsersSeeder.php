<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\table_user;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        table_user::create([
            'email' => 'carla@example.com',
            'nombre' => 'Thaira',
            'apellido' => 'Muñoz',
            'cedula' => '00-0000-0000',
            'telefono' => '6808-0258',
            'password' => bcrypt('carla1234'),
        ]);
        
        table_user::create([
            'email' => 'victor@example.com',
            'nombre' => 'Víctor',
            'apellido' => 'Hernández',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('victor2024'),
        ]);
        
        table_user::create([
            'email' => 'laura@example.com',
            'nombre' => 'Laura',
            'apellido' => 'Sánchez',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('laura5678'),
        ]);
        
        table_user::create([
            'email' => 'daniel@example.com',
            'nombre' => 'Daniel',
            'apellido' => 'Morales',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('daniel1234'),
        ]);
        
        table_user::create([
            'email' => 'sandra@example.com',
            'nombre' => 'Sandra',
            'apellido' => 'Jiménez',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('sandra2024'),
        ]);
        
        table_user::create([
            'email' => 'josefina@example.com',
            'nombre' => 'Josefina',
            'apellido' => 'Castro',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('josefina56'),
        ]);
        
        table_user::create([
            'email' => 'ricardo@example.com',
            'nombre' => 'Ricardo',
            'apellido' => 'Ruiz',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('ricardo789'),
        ]);
        
        table_user::create([
            'email' => 'patricia@example.com',
            'nombre' => 'Patricia',
            'apellido' => 'Mendoza',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('patricia2024'),
        ]);
        
        table_user::create([
            'email' => 'jorge@example.com',
            'nombre' => 'Jorge',
            'apellido' => 'Vázquez',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('jorge876'),
        ]);
        
        table_user::create([
            'email' => 'andrea@example.com',
            'nombre' => 'Andrea',
            'apellido' => 'Díaz',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('andrea123'),
        ]);
        
        table_user::create([
            'email' => 'marcos@example.com',
            'nombre' => 'Marcos',
            'apellido' => 'Paredes',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('marcos@2024'),
        ]);
        
        table_user::create([
            'email' => 'anais@example.com',
            'nombre' => 'Anaís',
            'apellido' => 'Torres',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('anais2024'),
        ]);
        
        table_user::create([
            'email' => 'martin@example.com',
            'nombre' => 'Martín',
            'apellido' => 'Guzmán',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('martin2024'),
        ]);
        
        table_user::create([
            'email' => 'elena@example.com',
            'nombre' => 'Elena',
            'apellido' => 'Ramírez',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('elena987'),
        ]);
        
        table_user::create([
            'email' => 'alberto@example.com',
            'nombre' => 'Alberto',
            'apellido' => 'Jiménez',
            'cedula' => '00-0000-0000',
            'telefono' => '0000-0000',
            'password' => bcrypt('alberto456'),
        ]);

        table_user::create([
            'email' => 'cesaruiz042804@gmail.com',
            'nombre' => 'César',
            'apellido' => 'Ruíz',
            'cedula' => '08-1009-0698',
            'telefono' => '6018-0332',
            'password' => bcrypt('Panam@042804'),
        ]);
            
    }
}

