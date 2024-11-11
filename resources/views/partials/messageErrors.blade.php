<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Unir todos los errores en un solo mensaje

            let errorMessage = '<ul style="list-style-type: none; padding-left: 0;">';
            @foreach ($errors->all() as $error)
                errorMessage += '<li>{{ $error }}</li>'; // Concatenar errores como elementos de lista
            @endforeach
            errorMessage += '</ul>';

            // Mostrar SweetAlert con soporte HTML
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: errorMessage, // Usar 'html' para que acepte etiquetas HTML
                confirmButtonText: 'Aceptar'
            });

        });
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>