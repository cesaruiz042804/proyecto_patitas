<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Datos de Usuario</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <!-- Fonts and icons -->
    <script src="{{ asset('asset_admin/js/plugin/webfont/webfont.min.js') }}"></script>
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
                </div>
                <!-- Navbar Header -->
                @include('admin.partials.navbar')
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Métrica de estado de citas médicas</h3>
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
                                <a href="#">Tables</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Datatables</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Citas médicas confirmadas</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>email</th>
                                                    <th>propietario</th>
                                                    <th>motivo</th>
                                                    <th>teléfono</th>
                                                    <th>Paciente</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>email</th>
                                                    <th>propietario</th>
                                                    <th>motivo</th>
                                                    <th>teléfono</th>
                                                    <th>Paciente</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    @if ($item['status'] == 'In Progress')
                                                        <tr>
                                                            <td>{{ $item['email'] }}</td> <!-- Email del dueño -->
                                                            <td>{{ $item['nombre'] }}</td> <!-- Nombre del dueño -->
                                                            <td>{{ $item['consulta'] }}</td>
                                                            <!-- Motivo de la consulta -->
                                                            <td>{{ $item['telefono'] }}</td> <!-- Teléfono del dueño -->
                                                            <td>{{ $item['mascota'] }}</td>
                                                            <!-- Nombre de la mascota -->
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Citas médicas pendientes</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="multi-filter-select" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>email</th>
                                                    <th>propietario</th>
                                                    <th>motivo</th>
                                                    <th>teléfono</th>
                                                    <th>Paciente</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>email</th>
                                                    <th>propietario</th>
                                                    <th>motivo</th>
                                                    <th>teléfono</th>
                                                    <th>Paciente</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody> <!-- Citas pendientes -->
                                                @foreach ($data as $item)
                                                    @if ($item['status'] == 'Scheduled')
                                                        <tr
                                                            data-especie="{{ $item['especie'] }}" data-raza="{{ $item['raza'] }}"
                                                            data-peso="{{ $item['peso'] }}" data-color="{{ $item['color'] }}"
                                                            data-edad="{{ $item['edad'] }}" data-cedula="{{ $item['cedula'] }}"
                                                            data-id_appointment="{{ $item['id_appointment'] }}">

                                                            <td>
                                                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $item['email'] }}" target="_blank">{{ $item['email'] }}</a>
                                                            </td>
                                                            <td>{{ $item['nombre'] }}</td><!-- Nombre del dueño -->
                                                            <td>{{ $item['consulta'] }}</td><!-- Motivo de la consulta -->
                                                            <td><!-- Teléfono del dueño -->
                                                                <a href="https://wa.me/507{{ str_replace('-', '', $item['telefono']) }}?text={{ urlencode('Patitas al Rescate\n\nEstimado/a, necesitamos más información sobre la cita que solicitó para poder asignarle correctamente el día de la cita. Por favor, indíquenos el tipo de servicio requerido y su preferencia de horario. Gracias.') }}}" target="_blank">
                                                                    {{ str_replace('-', '', $item['telefono']) }}
                                                                </a>
                                                            </td>
                                                            <td>{{ $item['mascota'] }}</td><!-- Nombre de la mascota -->
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-show-modal"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#myModal">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <button type="button" data-bs-toggle="tooltip"
                                                                        title="" class="btn btn-link btn-danger"
                                                                        data-original-title="Remove">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.modals.modals_info')

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
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});

            $("#multi-filter-select").DataTable({
                pageLength: 5,
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var column = this;
                            var select = $(
                                    '<select class="form-select"><option value=""></option></select>'
                                )
                                .appendTo($(column.footer()).empty())
                                .on("change", function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? "^" + val + "$" : "", true, false)
                                        .draw();
                                });

                            column.data().unique().sort().each(function(d, j) {
                                select.append('<option value="' + d + '">' + d +
                                    "</option>");
                            });
                        });
                },
            });

            // Al hacer clic en un botón dentro de la tabla
            $('#multi-filter-select').on('click', '.btn-show-modal', function() {
                const $row = $(this).closest('tr');

                // Captura los datos de la fila
                const email = $row.find('td:eq(0)').text().trim();
                const owner = $row.find('td:eq(1)').text().trim();
                const consultation = $row.find('td:eq(2)').text().trim();
                const phone = $row.find('td:eq(3)').text().trim();
                const pets = $row.find('td:eq(4)').text().trim();

                const especie = $row.data('especie');
                const raza = $row.data('raza');
                const color = $row.data('color');
                const edad = $row.data('edad');
                const peso = $row.data('peso');
                const cedula = $row.data('cedula');
                const id_appointment = $row.data('id_appointment');

                // Asigna los valores al modal
                $('#myModal #email').val('Email: ' + email);
                $('#myModal #owner').val('Dueño responsable: ' + owner);
                $('#myModal #consultation').val('Consulta: ' + consultation);
                $('#myModal #phone').val('Celular: ' + phone);
                $('#myModal #pets').val('Nombre de la mascota: ' + pets);

                $('#myModal #especie').val('Nombre de la mascota: ' + especie);
                $('#myModal #raza').val('Raza: ' + raza);
                $('#myModal #color').val('Color: ' + color);
                $('#myModal #peso').val('Peso: ' + peso);
                $('#myModal #edad').val('Edad: ' + edad);
                $('#myModal #cedula').val('Cédula: ' + cedula);
                $('#myModal #id_appointment').val('Cita: ' + id_appointment);

                // Muestra el modal
                $('#myModal').modal(
                    'show'); // Esto ayuda a que se vea el modal cuando haga la selección


            });
        });
    </script>


</body>

</html>
