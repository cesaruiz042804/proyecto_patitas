<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content='"Agenda fácilmente citas médicas para perros y gatos en nuestra plataforma. Promovemos la concientización sobre el cuidado responsable de los animales y ofrecemos servicios veterinarios de calidad. ¡Cuida a tu mascota con nosotros!"'>
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <link rel="preload" href="{{ asset('img_public/logo.png') }}" as="image">
    <link rel="preload" href="{{ asset('recursos_sobre_nosotros/img-form.jpg') }}" as="image">
    <link rel="stylesheet" href="{{ asset('asset_css/cita_medica.css') }}">
    <script src="https://unpkg.com/imask"></script>
    @vite('resources/js/app.js') <!-- Esto carga el script compilado -->
    <link rel="stylesheet" href="{{ asset('asset_css/exampleVueJs.css') }}">
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
        <div class="container">
            <form method="POST" action="{{ route('register.citas') }}" class="form" enctype="multipart/form-data">
                @csrf
                <!-- Campo oculto para el ID del dueño -->
                <input type="hidden" name="user" value="{{ session('user') }}">
                <h1 class="title-1">Historia Clínica</h1>

                <div class="content-animal">
                    <h2>Datos del paciente</h2>
                    <div id="app" class="app"></div>
                </div>

                <div class="content-btn">
                    <button class="btn-send" onclick="pageLoading('.container')">Enviar datos</button>
                </div>
            </form>
        </div>

        @include('partials.loading')

    </main>

    @include('partials.footer')

</body>

</html>
