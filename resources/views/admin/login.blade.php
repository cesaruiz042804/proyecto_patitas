<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content='"Agenda fácilmente citas médicas para perros y gatos en nuestra plataforma. Promovemos la concientización sobre el cuidado responsable de los animales y ofrecemos servicios veterinarios de calidad. ¡Cuida a tu mascota con nosotros!"'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('asset_css/admin/login.css') }}">
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

    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('admin.session') }}" class="form1 form-active">
                @csrf
                <h1> Patitas al rescate</h1>
                <h1>Administrador</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>Inicio de sesión</span>
                <input type="email" placeholder="email: example@dominio" name="email" value="{{ old('email') }}" />
                <input type="password" placeholder="Password" name="password" />
                <button onclick="pageLoading('.container')">Iniciar sesión</button>
            </form>
        </div>
    </div>

    @include('partials.loading')

</body>

</html>
