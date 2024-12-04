<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Datos de Usuario</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <!-- Fonts and icons -->
    <script src="{{ asset('asset_admin/js/plugin/webfont/webfont.min.js') }}"></script>
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
                        <h3 class="fw-bold mb-3">Tabla de usuarios</h3>
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
                                        <h4 class="card-title">Registro</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>email</th>
                                                    <th>nombre</th>
                                                    <th>apellido</th>
                                                    <th>cédula</th>
                                                    <th>teléfono</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>email</th>
                                                    <th>nombre</th>
                                                    <th>apellido</th>
                                                    <th>cédula</th>
                                                    <th>teléfono</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->nombre }}</td>
                                                        <td>{{ $user->apellido }}</td>
                                                        <td>{{ $user->cedula }}</td>
                                                        <td>{{ $user->telefono }}</td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <button type="button" data-bs-toggle="tooltip"
                                                                    title=""
                                                                    class="btn btn-link btn-primary btn-lg"
                                                                    data-original-title="Edit Task">
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

                                    column
                                        .search(val ? "^" + val + "$" : "", true, false)
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append(
                                        '<option value="' + d + '">' + d + "</option>"
                                    );
                                });
                        });
                },
            });

            // Add Row
            $("#add-row").DataTable({
                pageLength: 5,
            });


        });
    </script>
</body>

</html>
