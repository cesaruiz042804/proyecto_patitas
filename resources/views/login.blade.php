<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
    <link rel="preload" href="{{ asset('recursos_home/img_registro.jpg') }}" as="image">
    <link rel="stylesheet" href="{{ asset('asset_css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://unpkg.com/imask"></script>
<<<<<<< HEAD
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6

</head>

<body>
    <main>
<<<<<<< HEAD

        @if (session('partialMessage') == 'ok')
            @include('partials.messageGood')
        @else
            @include('partials.messageErrors')
        @endif

        @php
            session()->forget('partialMessage'); // Elimina la variable 'partialMessage' de la sesión
        @endphp
        
        <button class="btn-exit"><i class="fas fa-arrow-left"></i></button>

=======
        <button class="btn-exit"><i class="fas fa-arrow-left"></i></button>

        @include('partials.messageErrors')
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6

        <div class="container" id="container">
            <div class="container-content">
                <div class="switch-form">
                    <button class="signIn">Iniciar Sesión</button>
                    <button class="signUp">Registrarse</button>
                </div>
                <div class="form-container sign-up-container">
                    <form method="POST" action="{{ route('register') }}" class="form1 form-active">
                        @csrf
                        <h1>Crear cuenta</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <span>Usa tu correo para registrarte</span>
                        <input class="inputName" type="text" placeholder="Nombre" name="name"
                            value="{{ old('name') }}" />
                        <input class="inputLastname" type="text" placeholder="Apellido" name="lastname"
                            value="{{ old('lastname') }}" />
                        <input class="inputCedula" type="text" placeholder="Cédula (00-0000-0000)" name="id"
                            value="{{ old('id') }}" />
                        <input class="inputEmail" type="email" placeholder="email: example@dominio" name="email"
                            value="{{ old('email') }}" />
                        <input class="inputTel" type="text" placeholder="Teléfono (0000-0000)" name="tel"
                            value="{{ old('tel') }}" />
                        <input class="inputPassword" type="password" placeholder="Password" name="password" />
                        <button class="btn-register" onclick="pageLoading('.container')">Crear cuenta</button>
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form method="POST" action="{{ route('login.session') }}" class="form2 form-active">
                        @csrf
                        <h1>Inicio de sesión</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <span>Inicia sesión con tu cuenta</span>
                        <input type="email" placeholder="email: example@dominio" name="email2"
                            value="{{ old('email2') }}" />
                        <input type="password" placeholder="Password" name="password" />
                        <a href="#">Olvidaste tu contraseña?</a>
                        <button onclick="pageLoading('.container')">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div>

        @include('partials.loading')

    </main>

    <script src="{{ asset('asset_js/login.js') }}"></script>

    <script>
        document.querySelector('.btn-exit').addEventListener('click', function() {
            window.location.href = "{{ route('home') }}";
        });
    </script>
</body>

</html>
