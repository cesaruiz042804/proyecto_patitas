<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito de compra</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('asset_css/cart.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
</head>

<body>

    @include('partials.navbar')

    <main>
        <div class="container">
            @if (!empty($cartItems) && count($cartItems) > 0)
                <div class="container-products">
                    <h1 class="text-title">Carrito de Compras</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr id="row-{{ $item->id }}" data-subtotal="{{ $item->price * $cart[$item->id]['quantity'] }}">
                                    <td>{{ $item->name }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>{{ $cart[$item->id]['quantity'] }}</td>
                                    <td>${{ number_format($item->price * $cart[$item->id]['quantity'], 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST"
                                            class="remove-item-form" data-product-id="{{ $item->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                    <h3>Total: $<span id="total">{{ number_format($totalPrice, 2) }}</span></h3>
                    <a href="{{ route('checkout_paypal') }}" class="btn-primary">Proceder al Pago</a>
                </div>
            @else
                <div class="empty-cart-message">
                    <p>Tu carrito está vacío.</p>
                    <a href="{{ route('products') }}" class="btn btn-secondary">Ver Productos</a>
                </div>
            @endif
        </div>
    </main>
    

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        // Selecciona todos los formularios que tienen la clase 'remove-item-form' 
        // y añade un evento de escucha para cada uno.
        document.querySelectorAll('.remove-item-form').forEach(form => {
            form.addEventListener('submit', async (event) => {
                // Previene la acción predeterminada del formulario, que es recargar la página.
                event.preventDefault();

                // Crea un nuevo objeto FormData que contiene los datos del formulario
                // para que puedan ser enviados en la solicitud.
                const formData = new FormData(form);

                // Obtiene el ID del producto desde un atributo data del formulario.
                const productId = form.getAttribute('data-product-id');

                // Intenta obtener el token CSRF que se encuentra en una meta etiqueta del HTML.
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                    'content');
                // Si no se encuentra el token CSRF, se muestra un error en la consola y se detiene la ejecución.
                if (!csrfToken) {
                    console.error('CSRF token no encontrado');
                    return;
                }

                try {
                    // Realiza una solicitud 'fetch' al servidor para eliminar el producto del carrito.
                    // 'form.action' es la URL del formulario (la ruta que se configuró en Laravel).
                    const response = await fetch(form.action, {
                        method: 'POST', // Método HTTP que se utilizará
                        body: formData, // Los datos del formulario se envían como el cuerpo de la solicitud
                        headers: {
                            'X-CSRF-TOKEN': csrfToken, // Incluye el token CSRF en los encabezados para validar la solicitud
                        },
                    });

                    // Comprueba si la respuesta fue exitosa (código 200-299).
                    if (response.ok) {
                        // Si la eliminación fue exitosa, muestra un mensaje de éxito usando la función showToast.
                        showToast('Producto eliminado del carrito.', 'success');
                        const row = document.getElementById(`row-${productId}`);
                        const subtotal = parseFloat(row.getAttribute('data-subtotal')); // Obtener el subtotal del producto
                        const totalElement = document.getElementById("total");
                        let currentTotal = parseFloat(totalElement.innerText); // Obtener el total actual sin comas
                        // Restar el subtotal del producto eliminado
                        const newTotal = currentTotal - subtotal; 
                        totalElement.innerText = newTotal.toFixed(2); // Actualizar el total formateado
                        document.getElementById(`row-${productId}`).remove();

                    } else {
                        // Si la respuesta no es exitosa, muestra un mensaje de error indicando un problema en la eliminación.
                        showToast('Hubo un problema al eliminar el producto.', 'error');
                    }
                } catch (error) {
                    // Si ocurre un error en la solicitud (por ejemplo, problemas de red), se captura el error
                    // y se muestra un mensaje de error.
                    console.error('Error:', error);
                    showToast('No se pudo conectar al servidor.', 'error');
                }
            });
        });

        function showToast(message, type = 'success') {
            Toastify({
                text: message,
                duration: 3000, // Duración en milisegundos
                close: true, // Mostrar botón de cerrar
                gravity: 'top', // Posición: top o bottom
                position: 'right', // Posición: left, center o right
                backgroundColor: type === 'success' ? 'green' : 'red', // Color de fondo según el tipo
                stopOnFocus: true, // Detiene el temporizador si el usuario se enfoca en la notificación
            }).showToast();
        }
    </script>

</body>

</html>
