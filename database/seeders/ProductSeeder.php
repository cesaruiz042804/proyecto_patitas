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
            'description' => 'Un sofisticado plato doble diseñado especialmente para consentir a tu gato. Su diseño elegante y funcional permite que tu mascota disfrute de su comida y agua al mismo tiempo, manteniendo la elegancia en tu hogar.',
            'code' => '123456789',
            'price' => 25.00,
            'image' => 'resources_products/cat_bowl_double.jpg',
        ]);

        Product::create([
            'name' => 'Collares para Gatos',
            'description' => 'Estos collares para gatos combinan estilo y comodidad. Hechos con materiales de alta calidad, cada collar es un accesorio perfecto que asegura el bienestar y la seguridad de tu felino, sin sacrificar la elegancia.',
            'code' => '123456780',
            'price' => 10.00,
            'image' => 'resources_products/cat_collars.jpg',
        ]);

        Product::create([
            'name' => 'Arnés para Gatos',
            'description' => 'Un arnés exquisito que permite a tu gato explorar el mundo exterior con estilo. Diseñado para brindar comodidad y seguridad, este arnés es perfecto para paseos tranquilos y aventuras elegantes.',
            'code' => '123456781',
            'price' => 20.00,
            'image' => 'resources_products/cat_harness.jpg',
        ]);

        Product::create([
            'name' => 'Desparasitante',
            'description' => 'Un desparasitante eficaz y seguro que cuida de la salud de tu mascota. Formulado con ingredientes de calidad, garantiza el bienestar de tu amigo peludo, ayudando a mantenerlo sano y feliz.',
            'code' => '123456782',
            'price' => 15.00,
            'image' => 'resources_products/dewormer.jpg',
        ]);

        Product::create([
            'name' => 'Pelota para Perros',
            'description' => 'Una divertida pelota diseñada para mantener a tu perro activo y entretenido. Su material resistente asegura horas de juego, fomentando la actividad física y el bienestar de tu fiel compañero.',
            'code' => '123456783',
            'price' => 5.00,
            'image' => 'resources_products/dog_ball.webp',
        ]);

        Product::create([
            'name' => 'Cama para Perros',
            'description' => 'La cama perfecta para que tu perro descanse con estilo. Su diseño lujoso y confortable proporciona un espacio acogedor, asegurando que tu amigo peludo disfrute de dulces sueños y descanso reparador.',
            'code' => '123456784',
            'price' => 50.00,
            'image' => 'resources_products/dog_bed.jpg',
        ]);

        Product::create([
            'name' => 'Plato Doble para Perros',
            'description' => 'Un plato doble elegante y funcional que satisface las necesidades de alimentación y hidratación de tu perro. Diseñado para facilitar la vida diaria y embellecer tu hogar al mismo tiempo.',
            'code' => '123456785',
            'price' => 25.00,
            'image' => 'resources_products/dog_bowl_double.jpg',
        ]);

        Product::create([
            'name' => 'Plato para Perros',
            'description' => 'Un plato exquisito que combina funcionalidad y diseño. Perfecto para las comidas de tu perro, este plato es resistente y fácil de limpiar, asegurando que cada comida sea un placer.',
            'code' => '123456786',
            'price' => 15.00,
            'image' => 'resources_products/dog_bowl.webp',
        ]);

        Product::create([
            'name' => 'Collares para Perros',
            'description' => 'Collares elegantes que ofrecen seguridad y estilo a tu perro. Hechos con materiales duraderos, son perfectos para paseos y aventuras, garantizando que tu mascota luzca increíble.',
            'code' => '123456787',
            'price' => 10.00,
            'image' => 'resources_products/dog_collars.jpg',
        ]);

        Product::create([
            'name' => 'Arnés para Perros',
            'description' => 'Un arnés práctico y elegante que asegura la comodidad y seguridad de tu perro durante los paseos. Su diseño ergonómico permite una movilidad óptima, haciendo de cada salida una experiencia agradable.',
            'code' => '123456788',
            'price' => 20.00,
            'image' => 'resources_products/dog_harness.jpg',
        ]);

        Product::create([
            'name' => 'Correa para Perros',
            'description' => 'Una correa de alta calidad que proporciona control y estilo. Diseñada para asegurar la comodidad y seguridad de tu perro, es perfecta para paseos tranquilos y emocionantes aventuras.',
            'code' => '123456789',
            'price' => 15.00,
            'image' => 'resources_products/dog_leash.jpg',
        ]);

        Product::create([
            'name' => 'Casa para Perros',
            'description' => 'Una hermosa casa para perros que combina estilo y comodidad. Diseñada para brindar un refugio acogedor, tu perro se sentirá seguro y feliz en su propio espacio personal.',
            'code' => '123456790',
            'price' => 100.00,
            'image' => 'resources_products/house_dog.jpg',
        ]);

        Product::create([
            'name' => 'Juguete de Cuerda para Perros',
            'description' => 'Un juguete de cuerda resistente que fomenta la diversión y el ejercicio. Ideal para jugar a tirar y aflojar, este juguete no solo entretiene, sino que también fortalece el vínculo entre tú y tu perro.',
            'code' => '123456791',
            'price' => 8.00,
            'image' => 'resources_products/rope_tug.jpg',
        ]);

        Product::create([
            'name' => 'Champú',
            'description' => 'Un champú suave y efectivo, formulado especialmente para el cuidado de la piel y el pelaje de tu mascota. Su aroma fresco y propiedades hidratantes dejan a tu compañero peludo luciendo y oliendo maravillosamente.',
            'code' => '123456792',
            'price' => 12.00,
            'image' => 'resources_products/shampoo.jpg',
        ]);
    }
}
