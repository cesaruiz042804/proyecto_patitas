<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Tienda - Patitas al Rescate</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <!-- Fonts and icons -->
    <script src="{{ asset('asset_admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/filepond/dist/filepond.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/filepond/dist/filepond.js"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7847423066789696"
    crossorigin="anonymous"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('asset_admin/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('asset_admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_admin/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_admin/css/kaiadmin.min.css') }}" />

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

    <div class="wrapper">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                @include('admin.partials.navbar')
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Tabla de productos</h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="icon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Información de productos</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Carrito de compra</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Datos de producto</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('admin.cart.add.product') }}"
                                            id="form-info-product"  enctype="multipart/form-data">
                                            @csrf
                                            <!-- Título -->
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Título de la cita" name="name" value="{{ old('name') }}" />
                                                <label for="floatingInput">Título</label>
                                            </div>

                                            <!-- Descripción -->
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Descripción" name="description" value="{{ old('description') }}" />
                                                <label for="floatingInput">Descripción</label>
                                            </div>

                                            <!-- Código -->
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="Código" name="code" value="{{ old('code') }}" />
                                                <label for="floatingInput">Código</label>
                                            </div>

                                            <!-- Monto -->
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control"
                                                    aria-label="Amount (to the nearest dollar)" placeholder="Monto"
                                                    name="price" value="{{ old('price') }}" >
                                            </div>

                                            <!-- Imagen -->
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Selecciona una imagen</label>
                                                <input class="form-control" type="file" id="formFile"
                                                    name="image">
                                            </div>

                                            <!-- Previsualización de la imagen -->
                                            <div id="imagePreview" class="mt-3 mb-3">
                                                <!-- Aquí se mostrará la previsualización -->
                                            </div>

                                            <!-- Botones de acción -->
                                            <div class="mb-3">
                                                <button type="submit"
                                                    class="btn btn-success px-4 py-2 rounded-3 shadow-sm hover-shadow" id="submitBtn">Agregar
                                                    producto</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('asset_admin/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('asset_admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('asset_admin/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('asset_admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('asset_admin/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Kaiadmin JS -->
    <script src="{{ asset('asset_admin/js/kaiadmin.min.js') }}"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('asset_admin/js/setting-demo2.js') }}"></script>

    <script>
        // Obtén el input de tipo file y el contenedor para la previsualización
        const inputFile = document.getElementById('formFile');
        const imagePreview = document.getElementById('imagePreview');

        // Escucha cuando el usuario seleccione un archivo
        inputFile.addEventListener('change', function(event) {
            const file = event.target.files[0]; // Obtiene el primer archivo seleccionado

            if (file) {
                const reader = new FileReader(); // Crea un FileReader

                // Definir lo que sucederá cuando la imagen sea leída
                reader.onload = function(e) {
                    // Crea una imagen con la fuente de la lectura del archivo
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.alt = 'Previsualización de la imagen';

                    // Establecer un tamaño fijo usando clases de Bootstrap
                    imgElement.classList.add('img-fluid', 'rounded', 'mx-auto');
                    imgElement.style.width = '320px'; // Puedes ajustar el tamaño según lo que necesites
                    imgElement.style.height = '320px'; // También puedes ajustar el alto

                    // Borra cualquier contenido anterior y muestra la nueva imagen
                    imagePreview.innerHTML = '';
                    imagePreview.appendChild(imgElement);
                };

                // Lee el archivo como URL
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('submitBtn').addEventListener('click', function(event) {
            // Prevenir el envío del formulario al hacer clic
            event.preventDefault();

            // Desactiva el botón después de hacer clic
            const btnSubmit = document.getElementById('submitBtn');
            btnSubmit.disabled = true;

            // Enviar el formulario después de limpiar los campos (si es necesario)
            document.getElementById('form-info-product').submit();
            console.log('click');
        });
    </script>

</body>

</html>
