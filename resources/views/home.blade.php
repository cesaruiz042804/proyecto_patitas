<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content='"Agenda fácilmente citas médicas para perros y gatos en nuestra plataforma. Promovemos la concientización sobre el cuidado responsable de los animales y ofrecemos servicios veterinarios de calidad. ¡Cuida a tu mascota con nosotros!"'>
    <meta name="keywords"
        content="adopción de mascotas, rescate de perros y gatos, donación para animales, servicios veterinarios, agenda de citas médicas para mascotas">
    <link rel="preload" href="{{ asset('img_public/logo.png') }}" as="image">
    <link rel="preload" href="{{ asset('/recursos_home/img_background_login.jpg') }}" as="image">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('asset_css/home.css') }}">
    <!--
    php -S localhost:8000 -t public
    php -S 192.168.0.11:8000 -t public movil
 -->
    <title>Home</title>
</head>

<body>

    @if (session()->has('partialsMessage') && session('partialsMessage') == 'ok')
        @include('partials.messageGood')
    @else
        @include('partials.messageErrors')
    @endif

    @php
        session()->forget('partialsMessage'); // Elimina la variable 'partialMessage' de la sesión
    @endphp

    @include('partials.navbar')

    <main>
        <div class="content-header">
            <h1 class="title-h1">Patitas al rescate</h1>
            <p>"Un centro para salvar perros y gatos es una noble iniciativa"</p>
            <div class="btn-home">
                <a href="{{ route('donation') }}" class="btn">Realizar donación</a>
                <a href="{{ route('cita_medica') }}" class="btn">Agendar citas</a>
            </div>
        </div>

        <section class="content-products">
            <div class="content-products-title">
                <div class="content-products-info">
                    <h2 class="title-h2">Tu aliado en el cuidado de tu mascota</h2>
                </div>
                <div class="content-products-info">
                    <p class="paragraph-p1"> Ofrecemos una variedad de servicios para ayudarte a cuidar de tu compañero animal,
                        desde encontrar el
                        nuevo
                        miembro de tu familia hasta agendar citas veterinarias y conocer más sobre programas de rescate.</p>
                </div>
            </div>
            <div class="box-container">
                <!--
                <div class="box">
                    <i class="fa-solid fa-dog"></i>
                    <h3>Adoptar</h3>
                    <p>Dale un nuevo hogar a un animal necesitado.</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-kit-medical"></i>
                    <h3>Rescate</h3>
                    <p>Ayúdanos a salvar vidas.</p>
                </div>
            -->
                <div class="box">
                    <i class="fa-solid fa-gift"></i>
                    <h3>Donación</h3>
                    <p>Con tu ayuda, podemos seguir rescatando y cuidando más animales.</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-box-open"></i>
                    <h3>Tienda de Productos</h3>
                    <p>Compra productos para el bienestar de los animales que ayudamos.</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-calendar-days"></i>
                    <h3>Agendar</h3>
                    <p>Agenda tu cita hoy mismo.</p>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')

</body>

</html>
