<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

@if (session('message')) <!-- Cambié $message a session('message') -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el mensaje desde la sesión
            let message = `{{ session('message') }}`; // Usa session para acceder al mensaje

            // Mostrar SweetAlert con soporte HTML
            Swal.fire({
<<<<<<< HEAD
                icon: 'success', // Cambia 'error' a 'success' si es un mensaje de éxito
                title: 'Éxito',
=======
<<<<<<< HEAD
                icon: 'success', // Cambia 'error' a 'success' si es un mensaje de éxito
                title: 'Éxito',
=======
                icon: 'error', // Cambia 'error' a 'success' si es un mensaje de éxito
                title: 'Oops...',
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
>>>>>>> 51923894247a93a57e2907aaff37b1b93760fe7d
                html: message, // Usar 'html' para que acepte etiquetas HTML
                confirmButtonText: 'Aceptar'
            });
        });
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
