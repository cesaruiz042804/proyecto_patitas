<link rel="stylesheet" href="{{ asset('asset_css/partials/navbar.css') }}">

@php
    use Illuminate\Support\Facades\Route; //importar la clase Route
@endphp

<header>
    <div class="hamburger-menu {{ Route::currentRouteName() }}">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>
        <div class="menu__box">
            <div class="logo">
                <a href="{{ route('home') }}" title="Visitar nuestra página principal">
                    <img src="{{ asset('img_public/logo.png') }}" alt="Logo de Patitas al Rescate"
                        title="Haz clic para visitar página principal">
                </a>
            </div>
            <div><a class="menu__item" href="{{ route('home') }}" title="Ir a la página de home">Inicio</a></div>
            <div><a class="menu__item" href="{{ route('about') }}" title="Ir a la página de Sobre nosotros">Sobre
                    nosotros</a></div>
            <div><a class="menu__item" href="{{ route('cita_medica') }}" title="Ir a la página de Cita médica">Cita
                    médica</a></div>
            <div><a class="menu__item" href="{{ route('donation') }}" title="Ir a la página de Donación">Donación</a>
            </div>
            <div><a class="menu__item" href="{{ route('products') }}" title="Ir a la página de Tienda">Tienda</a></div>

            @if (session()->has('user'))
                <div>
                    <a class="menu__item" id="openModal-movil" href="#" title="Click para cerrar sesión">Cerrar
                        sesión</a>
                </div>
            @else
                <!-- Botón de iniciar sesión cuando el usuario no está autenticado -->
                <div><a class="menu__item" href="{{ route('login') }}" title="Click para iniciar sesión">Iniciar
                        sesión</a></div>
            @endif
        </div>
    </div>
    <div class="modal-overlay-navbar" id="modalOverlay-navbar">
        <div class="modal-navbar">
            <form class="form-session" action="{{ route('logout.session') }}" method="POST">
                @csrf
                <div class="container-session">
                    <span>Deseas cerrar la sesión?</span>
                </div>
                <div class="container-session">
                    <button type="button" id="closeModal-navbar">Continuar</button>
                    <button type="submit">Cerrar sessión</button>
                </div>
            </form>
        </div>
    </div>
</header>

<script src="{{ asset('asset_js/partials/navbar.js') }}"></script>
