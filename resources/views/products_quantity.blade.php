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
            <div class="card">
                <div class="card-body">
                    <div class="card-body-item">
                        <img src="{{ $product->image }}?v={{ $product->updated_at->timestamp }}" class="card-img"
                            alt="{{ $product->name }}" loading="lazy" style="">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Precio: ${{ number_format($product->price, 2) }}</p>
                    </div>
                    <div class="card-body-form">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form"
                            data-product-id="{{ $product->id }}">
                            @csrf
                            <input type="hidden" name="quantity" class="inputQuantity" value="{{ $quantity }}"
                                min="1" step="1">

                            @if ($inCart)
                                <button class="box-quantity">Actualizar cantidad</button>
                            @else
                                <button class="box-quantity">Agregar al carrito</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')

    <script>
        document.querySelector('.btn-cart').addEventListener('click', function() {
            window.location.href = "{{ route('cart.show') }}";
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</body>

</html>
