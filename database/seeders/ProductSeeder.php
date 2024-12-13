<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Plato Doble para Gatos',
            'description' => 'Plato doble elegante y funcional para que tu gato disfrute de comida y agua al mismo tiempo.',
            'code' => '123456789',
            'price' => 25.00,
            'image' => 'resources_products/cat_bowl_double.jpg',
        ]);
        
        Product::create([
            'name' => 'Collares para Gatos',
            'description' => 'Collares cómodos y seguros, perfectos para el bienestar y estilo de tu gato.',
            'code' => '123456780',
            'price' => 10.00,
            'image' => 'resources_products/cat_collars.jpg',
        ]);
        
        Product::create([
            'name' => 'Arnés para Gatos',
            'description' => 'Arnés cómodo y seguro para paseos tranquilos y aventuras al aire libre.',
            'code' => '123456781',
            'price' => 20.00,
            'image' => 'resources_products/cat_harness.jpg',
        ]);
        
        Product::create([
            'name' => 'Desparasitante',
            'description' => 'Desparasitante eficaz que garantiza la salud y bienestar de tu mascota.',
            'code' => '123456782',
            'price' => 15.00,
            'image' => 'resources_products/dewormer.jpg',
        ]);
        
        Product::create([
            'name' => 'Pelota para Perros',
            'description' => 'Pelota resistente para mantener a tu perro activo y entretenido durante horas.',
            'code' => '123456783',
            'price' => 5.00,
            'image' => 'resources_products/dog_ball.webp',
        ]);
        
        Product::create([
            'name' => 'Cama para Perros',
            'description' => 'Cama lujosa y cómoda para un descanso reparador y acogedor de tu perro.',
            'code' => '123456784',
            'price' => 50.00,
            'image' => 'resources_products/dog_bed.jpg',
        ]);
        
        Product::create([
            'name' => 'Plato Doble para Perros',
            'description' => 'Plato doble práctico y elegante para la comida y agua de tu perro.',
            'code' => '123456785',
            'price' => 25.00,
            'image' => 'resources_products/dog_bowl_double.jpg',
        ]);
        
        Product::create([
            'name' => 'Plato para Perros',
            'description' => 'Plato resistente y fácil de limpiar para las comidas de tu perro.',
            'code' => '123456786',
            'price' => 15.00,
            'image' => 'resources_products/dog_bowl.webp',
        ]);
        
        Product::create([
            'name' => 'Collares para Perros',
            'description' => 'Collares duraderos que aseguran seguridad y estilo para tu perro.',
            'code' => '123456787',
            'price' => 10.00,
            'image' => 'resources_products/dog_collars.jpg',
        ]);
        
        Product::create([
            'name' => 'Arnés para Perros',
            'description' => 'Arnés ergonómico que garantiza comodidad y seguridad durante los paseos.',
            'code' => '123456788',
            'price' => 20.00,
            'image' => 'resources_products/dog_harness.jpg',
        ]);
        
        Product::create([
            'name' => 'Correa para Perros',
            'description' => 'Correa resistente que ofrece control y estilo para paseos tranquilos.',
            'code' => '123456789',
            'price' => 15.00,
            'image' => 'resources_products/dog_leash.jpg',
        ]);
        
        Product::create([
            'name' => 'Casa para Perros',
            'description' => 'Casa cómoda y elegante para que tu perro tenga su propio espacio.',
            'code' => '123456790',
            'price' => 100.00,
            'image' => 'resources_products/house_dog.jpg',
        ]);
        
        Product::create([
            'name' => 'Juguete de Cuerda para Perros',
            'description' => 'Juguete resistente que promueve el ejercicio y fortalece el vínculo contigo.',
            'code' => '123456791',
            'price' => 8.00,
            'image' => 'resources_products/rope_tug.jpg',
        ]);
        
        Product::create([
            'name' => 'Champú',
            'description' => 'Champú suave para cuidar la piel y pelaje de tu mascota, dejándola fresca y limpia.',
            'code' => '123456792',
            'price' => 12.00,
            'image' => 'resources_products/shampoo.jpg',
        ]);        
    }
}
