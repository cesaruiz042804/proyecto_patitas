<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="{{ asset('img_public/logo.png') }}" as="image">
    <link rel="preload" href="{{ asset('/recursos_home/img_background_login.jpg') }}" as="image">
    <link rel="stylesheet" href="{{ asset('asset_css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<<<<<<< HEAD
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
    <!-- Librería para el uso de íconos
    php -S localhost:8000 -t public
    php -S 192.168.0.11:8000 -t public movil -->
    <title>Home</title>
</head>

<body>
<<<<<<< HEAD

    @if (session('partialMessage') == 'ok')
        @include('partials.messageGood')
    @else
        @include('partials.messageErrors')
    @endif

    @php
        session()->forget('partialMessage'); // Elimina la variable 'partialMessage' de la sesión
    @endphp

=======
    
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
    @include('partials.navbar')

    <main>
        <div class="content-header">
            <h2 class="title-h1">Patitas al rescate</h2>
            <p>"Un centro para salvar perros y gatos es una noble iniciativa"</p>
            <div class="btn-home">
                <a href="{{ route('donation') }}" class="btn">Realizar donación</a>
                <a href="{{ route('cita_medica') }}" class="btn">Agendar citas</a>
            </div>
        </div>

        <section class="content-products">
            <h2 class="title-h2">Tu aliado en el cuidado de tu mascota</h2>
            <p class="paragraph-p1"> Ofrecemos una variedad de servicios para ayudarte a cuidar de tu compañero animal,
                desde encontrar el
                nuevo
                miembro de tu familia hasta agendar citas veterinarias y conocer más sobre programas de rescate.</p>
            <div class="box-container">
                <div class="box">
                    <i class="fa-solid fa-dog"></i>
                    <h3>Adoptar</h3>
                    <p>Dale un nuevo hogar a un animal necesitado.</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-calendar-days"></i>
                    <h3>Agendar</h3>
                    <p>Agenda tu cita hoy mismo.</p>
                </div>
                <div class="box">
                    <i class="fa-solid fa-kit-medical"></i>
                    <h3>Rescate</h3>
                    <p>Ayúdanos a salvar vidas.</p>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')

</body>

</html>
