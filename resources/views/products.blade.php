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

                            <div class="card-body-item">
                                <img src="{{ $product->image }}?v={{ $product->updated_at->timestamp }}"
                                    class="card-img" alt="{{ $product->name }}" loading="lazy">
                                <h5 class="card-title">{{ $product->name }}</h5>
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
                                                data-product-id="{{ $product->id }}">Ya en el carrito</button>
                                        @else
                                            <button type="button" class="openModal box-quantity"
                                                data-product-id="{{ $product->id }}">Agregar al carrito</button>
                                        @endif

                                        <div id="modal-{{ $product->id }}" class="modal">
                                            <div class="modal-content">
                                                <div class="content-product-info-img">
                                                    <img src="{{ $product->image }}?v={{ $product->updated_at->timestamp }}"
                                                        alt="{{ $product->name }}" loading="lazy">
                                                </div>
                                                <div class="content-product-info-text">
                                                    <span class="close"
                                                        data-modal-id="{{ $product->id }}">&times;</span>
                                                    <button type="button" class="quantity-btn decrease">-</button>
                                                    <input type="number" class="quantity-input inputQuantity"
                                                        id="quantity-{{ $product->id }}" min="0"
                                                        name="quantity" value="{{ $quantity }}" />
                                                    <button type="button" class="quantity-btn increase">+</button>
                                                </div>
                                                <div class="content-product-info-text">
                                                    <button type="submit" class="btn-save">Guardar</button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Manejador para abrir el modal
            document.querySelectorAll('.openModal').forEach(btn => {
                const productId = btn.getAttribute('data-product-id');
                btn.addEventListener('click', () => openModal(productId)); // Abre el modal
            });

            // Manejador para cerrar el modal
            document.querySelectorAll('.close').forEach(closeBtn => {
                const productId = closeBtn.getAttribute('data-modal-id');
                closeBtn.addEventListener('click', () => closeModal(productId)); // Cierra el modal
            });

            // Cerrar el modal al hacer clic fuera del contenido
            window.addEventListener('click', (e) => {
                document.querySelectorAll('.modal').forEach(modal => {
                    if (e.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            });

            // Función para abrir el modal
            function openModal(productId) {
                const modal = document.getElementById(`modal-${productId}`);
                modal.style.display = 'flex'; // Mostrar el modal
            }

            // Función para cerrar el modal
            function closeModal(productId) {
                const modal = document.getElementById(`modal-${productId}`);
                modal.style.display = 'none'; // Ocultar el modal
            }

            // Función para cambiar la cantidad
            function changeQuantity(amount, productId) {
                const quantityInput = document.getElementById(`quantity-${productId}`);
                if (quantityInput) {
                    let currentQuantity = parseInt(quantityInput.value);
                    if (currentQuantity + amount >= 0) {
                        quantityInput.value = currentQuantity + amount;
                    }
                }
            }

            // Manejadores para los botones de cantidad (+ y -)
            document.querySelectorAll('.quantity-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = button.closest('.modal').getAttribute('id').replace('modal-',
                        '');
                    const action = button.classList.contains('increase') ? 1 : -1;
                    changeQuantity(action, productId); // Cambia la cantidad
                });
            });

            // Lógica para manejar el formulario de agregar al carrito
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
                form.addEventListener('submit', async (event) => {
                    event.preventDefault(); // Evita el recargo de la página

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
                    }
                });
            });


            // Función para mostrar notificaciones usando Toastify
            function showToast(message, type) {
                Toastify({
                    text: message,
                    backgroundColor: type === 'success' ? 'green' : 'red',
                    duration: 3000,
                    close: true
                }).showToast();
            }

            // Redirigir al carrito al hacer clic en el icono del carrito
            document.querySelector('.btn-cart').addEventListener('click', function() {
                window.location.href = "{{ route('cart.show') }}";
            });
        });
    </script>

</body>

</html>
