<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content='"Agenda fácilmente citas médicas para perros y gatos en nuestra plataforma. Promovemos la concientización sobre el cuidado responsable de los animales y ofrecemos servicios veterinarios de calidad. ¡Cuida a tu mascota con nosotros!"'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Administrador</title>
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
</body>

</html>
