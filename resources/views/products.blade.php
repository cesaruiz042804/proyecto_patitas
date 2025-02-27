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
                    <button class="btn-cart" title="Ir a carrito de compra">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#403192"
                            class="bi bi-cart4" viewBox="0 0 16 16" alt="carrito de compra">
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

                            <div class="card-body-item">
                                <img src="{{ $product->image }}?v={{ $product->updated_at->timestamp }}"
                                    class="card-img" alt="{{ $product->name }}" loading="lazy">
                                <h2 class="card-title">{{ $product->name }}</h2>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Precio: ${{ number_format($product->price, 2) }}</p>
                            </div>
                            <div class="card-body-form">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                    class="add-to-cart-form" data-product-id="{{ $product->id }}">
                                    @csrf
                                    <div class="container-btn">
                                        @if ($inCart)
                                            <button type="button" class="openModal box-quantity"
                                                data-product-id="{{ $product->id }}" title="Actualizar cantidad">Ya en el carrito</button>
                                        @else
                                            <button type="button" class="openModal box-quantity"
                                                data-product-id="{{ $product->id }}" title="Agregar cantidad">Agregar al carrito</button>
                                        @endif

                                        <div id="modal-{{ $product->id }}" class="modal">
                                            <div class="modal-content">
                                                <div class="content-product-info-img">
                                                    <h5>{{ $product->name }}</h5>
                                                    <img src="{{ $product->image }}?v={{ $product->updated_at->timestamp }}"
                                                        alt="{{ $product->name }}" loading="lazy">
                                                </div>
                                                <div class="content-product-info-text">
                                                    <span class="close"
                                                        data-modal-id="{{ $product->id }}">&times;</span>
                                                    <button type="button" class="quantity-btn decrease" title="Disminuir cantidad">-</button>
                                                    <input type="number" class="quantity-input inputQuantity"
                                                        id="quantity-{{ $product->id }}" min="0"
                                                        name="quantity" value="{{ $quantity }}" />
                                                    <button type="button" class="quantity-btn increase" title="Aumentar cantidad">+</button>
                                                </div>
                                                <div class="content-product-info-text">
                                                    <button type="submit" class="btn-save" title="Guardar producto">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <script src="{{ asset('asset_js/products.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lógica para manejar el formulario de agregar al carrito
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
                form.addEventListener('submit', async (event) => {
                    event.preventDefault(); // Evita el recargo de la página

                    const saveButton = form.querySelector('.btn-save');
                    saveButton.disabled = true; // Deshabilita el botón
                    const originalText = saveButton
                        .textContent; // Guarda el texto original del botón
                    saveButton.textContent = 'Guardando...'; // Cambia el texto temporalmente

                    const formData = new FormData(form);
                    const productId = form.getAttribute('data-product-id');

                    // Asegúrate de obtener el valor correcto de la cantidad
                    const quantityInput = document.getElementById(`quantity-${productId}`);
                    const quantity = quantityInput ? parseInt(quantityInput.value) :
                        1; // Asegúrate de que la cantidad sea un número

                    // Actualiza el valor de la cantidad en el formulario antes de enviarlo
                    form.querySelector('.inputQuantity').value = quantity;

                    try {
                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute(
                                    'content'),
                            },
                        });

                        const contentType = response.headers.get("content-type");

                        if (contentType && contentType.includes("application/json")) {
                            const data = await response
                                .json(); // Procesa la respuesta como JSON

                            if (response.ok) {
                                showToast(data.success, 'success');
                                // Actualiza la cantidad en el formulario después de que el producto se haya agregado
                                form.querySelector('.inputQuantity').value = data.quantity;

                                // Cierra el modal al guardar correctamente
                                closeModal(productId);
                            } else {
                                showToast(data.error ||
                                    'Hubo un problema al agregar el producto.', 'error');
                            }
                        } else {
                            const text = await response.text();
                            console.error('Respuesta no es JSON:',
                                text); // Muestra en la consola para depuración
                            showToast('Error inesperado en el servidor.', 'error');
                        }
                    } catch (error) {
                        console.error('Error en la solicitud:', error);
                        showToast('Error de conexión.', 'error');
                    } finally {
                        saveButton.disabled = false; // Rehabilita el botón
                        saveButton.textContent = originalText; // Restaura el texto original
                    }
                });
            });

            // Redirigir al carrito al hacer clic en el icono del carrito
            document.querySelector('.btn-cart').addEventListener('click', function() {
                window.location.href = "{{ route('cart.show') }}";
            });
        });
    </script>

</body>

</html>
