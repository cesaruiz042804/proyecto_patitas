<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

@if (session('message')) <!-- Cambié $message a session('message') -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el mensaje desde la sesión
            let message = `{{ session('message') }}`; // Usa session para acceder al mensaje

            // Mostrar SweetAlert con soporte HTML
            Swal.fire({
                icon: 'success', // Cambia 'error' a 'success' si es un mensaje de éxito
                title: 'Éxito',
                html: message, // Usar 'html' para que acepte etiquetas HTML
                confirmButtonText: 'Aceptar'
            });
        });
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
