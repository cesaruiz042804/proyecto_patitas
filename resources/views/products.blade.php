<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content='"Agenda fácilmente citas médicas para perros y gatos en nuestra plataforma. Promovemos la concientización sobre el cuidado responsable de los animales y ofrecemos servicios veterinarios de calidad. ¡Cuida a tu mascota con nosotros!"'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('asset_css/products.css') }}">
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <title>Tienda</title>
</head>

<body>

    @include('partials.navbar')

    <main>
        <div class="container">
            <div class="header-products">
                <div class="header-items">
                    <h1 class="title-items">Nuestros Productos</h1>
                    <button class="btn-cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#403192"
                            class="bi bi-cart4" viewBox="0 0 16 16">
                            <path
                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card">
                        <div class="card-body">

                            @php
                                $cart = session()->get('cart', []);
                                $inCart = isset($cart[$product->id]);
                                $quantity = $inCart ? $cart[$product->id]['quantity'] : 0; // Obtén la cantidad si está en el carrito
                            @endphp

                            @if ($inCart)
                                <div class="text-span">
                                    <span class="product-status" data-product-id="{{ $product->id }}">En el Carrito
                                        ({{ $quantity }})
                                    </span>
                                </div>
                            @else
                            
                                <div class="text-span">
                                    <span class="product-status" data-product-id="{{ $product->id }}">¡No te lo
                                        pierdas!</span>
                                </div>
                            
                            @endif
                            <div class="card-body-item">
                                <img src="{{ $product->image }}?v={{ $product->updated_at->timestamp }}"
                                    class="card-img" alt="{{ $product->name }}" loading="lazy"
                                    style="width: 200px; height: 200px;">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Precio: ${{ number_format($product->price, 2) }}</p>
                            </div>
                            <div class="card-body-form">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                    class="add-to-cart-form" data-product-id="{{ $product->id }}">
                                    @csrf


                                    <input type="hidden" name="quantity" class="inputQuantity"
                                        value="{{ $quantity }}" min="1" step="1">

                                    @if ($inCart)
                                        <button class="box-quantity">Actualizar cantidad</button>
                                    @else
                                        <!--
                                                <button type="submit" class="btn-primary btn-send">Agregar al carrito</button>
                                            -->
                                        <button class="box-quantity">Agregar al carrito</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    @include('partials.footer')

    <script>
        document.querySelector('.btn-cart').addEventListener('click', function() {
            window.location.href = "{{ route('cart.show') }}";
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        document.querySelectorAll('.add-to-cart-form').forEach(form => {
            const btnQuantity = form.querySelector('.box-quantity');
            const quantityInput = form.querySelector('.inputQuantity');

            //console.log('form');
            if (btnQuantity) {
                let isAlertShown = false;

                btnQuantity.addEventListener('click', async (event) => {
                    event.preventDefault(); // Evita el envío inmediato del formulario
                    console.log('form');
                    if (isAlertShown) return;

                    isAlertShown = true;

                    const result = await Swal.fire({
                        title: 'Ingresa la nueva cantidad',
                        input: 'number',
                        inputPlaceholder: 'Nueva cantidad',
                        inputValue: quantityInput.value,
                        showCancelButton: true,
                        confirmButtonText: 'Aceptar',
                        cancelButtonText: 'Cancelar',
                        inputValidator: (value) => {
                            if (!value || value <= 0) {
                                return 'Por favor ingresa una cantidad válida.';
                            }
                        }
                    });

                    if (result.isConfirmed) {
                        quantityInput.value = result.value; // Actualiza el valor del input
                        console.log('Nueva cantidad para el producto', form.dataset.productId, ':',
                            result.value);

                        // **Enviar el formulario manualmente después de actualizar el input**
                        form.dispatchEvent(new Event('submit')); // Desencadena el envío manual
                    }

                    isAlertShown = false;

                });
            }

            // Modificar el evento de envío del formulario
            form.addEventListener('submit', async (event) => {
                event.preventDefault(); // Evita el recargo de la página

                const formData = new FormData(form);
                const productId = form.getAttribute('data-product-id');
                const statusSpan = document.querySelector(
                    `.product-status[data-product-id="${productId}"]`);

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                        },
                    });

                    const data = await response.json();

                    if (response.ok) {
                        showToast(data.success, 'success');
                        statusSpan.textContent =
                            `En el Carrito (${data.quantity})`; // Actualiza el texto del span
                        form.querySelector('.inputQuantity').value = data
                            .quantity; // Actualiza el input
                        btnQuantity.textContent = 'Actualizar cantidad';

                    } else {
                        showToast(data.error || 'Hubo un problema al agregar el producto.', 'error');
                    }
                } catch (error) {
                    console.log('Error: ', error);
                    showToast('Error de conexión.', 'error');
                }
            });
        });

        function showToast(message, type = 'success') {
            Toastify({
                text: message,
                duration: 2000, // Duración en milisegundos
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
