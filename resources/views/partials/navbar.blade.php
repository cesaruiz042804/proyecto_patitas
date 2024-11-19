<link rel="stylesheet" href="{{ asset('asset_css/partials/navbar.css') }}">

@php
    use Illuminate\Support\Facades\Route; //importar la clase Route
<<<<<<< HEAD
@endphp

<header>
    <div class="hamburger-menu {{ Route::currentRouteName() }}">
=======
@endphp 

<header>
    <div class="hamburger-menu {{ Route::currentRouteName() }}" >
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>
        <ul class="menu__box">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img_public/logo.png') }}" alt="Logo">
                </a>
            </div>
            <li><a class="menu__item" href="{{ route('home') }}">Inicio</a></li>
            <li><a class="menu__item" href="{{ route('about') }}">Sobre nosotros</a></li>
            <li><a class="menu__item" href="{{ route('cita_medica') }}">Cita médica</a></li>
            <li><a class="menu__item" href="{{ route('donation') }}">Donación</a></li>
            <li><a class="menu__item" href="{{ route('products') }}">Tienda</a></li>
            @if (session()->has('user'))
                <!-- Sección de perfil cuando el usuario está autenticado -->
<<<<<<< HEAD
                <!--
                <img class="img-login"
                            src="{ asset('img_public/img_user.png') }}" alt="">
                -->
                <li>
                    <a class="menu__item" href="{{ route('logout') }}">Cerrar sesión</a>
                </li>
=======
                <li><a class="menu__item" href="{{ route('logout') }}">Cerrar sesión</a></li>
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
            @else
                <!-- Botón de iniciar sesión cuando el usuario no está autenticado -->
                <li><a class="menu__item" href="{{ route('login') }}">Iniciar sesión</a></li>
            @endif
        </ul>
    </div>
</header>
