<!--

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proceso de pago</title>
    <link rel="stylesheet" href="{{ asset('asset_css/payment_paypal.css') }}">
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
</head>

<body>
    <div class="container">
        <form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="business" value="sb-i47l6a27301038@business.example.com">
            <input type="hidden" name="currency_code" value="USD">

            @php
                $cart = session()->get('cart', []);
                $index = 1;
            @endphp

            @if (!empty($cart))
@foreach ($cart as $producto)
<div style="border: 2px solid black">
                    <input type="hidden" name="item_name_{{ $index }}" value="{{ $producto['name'] }}">
                    <input type="hidden" name="item_number_{{ $index }}" value="{{ $producto['id'] }}">
                    <input type="hidden" name="amount_{{ $index }}" value="{{ $producto['price'] }}">
                    <input type="hidden" name="quantity_{{ $index }}" value="{{ $producto['quantity'] }}">
                    
                    <label for="">[{{ $producto['name'] }}]</label>
                    <label for="">[{{ $producto['id'] }}]</label>
                    <label for="">[{{ $producto['price'] }}]</label>
                    <label for="">[{{ $producto['quantity'] }}]</label>
                    
                    @php $index++ @endphp
                </div>
@endforeach
@endif

            <input type="hidden" name="return" value="{{ route('home') }}">
            <input type="hidden" name="notify_url" value="https://95b3-190-219-188-201.ngrok-free.app/payment/webhook">
            <input type="hidden" name="cancel_return" value="{{ route('home') }}">

            <input type="submit" value="Pagar con PayPal">
        </form>
    </div>

</body>

</html>

-->



<!--
<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="sb-weyi531940548@business.example.com">
    <input type="hidden" name="item_name" value="Nombre del producto a comprar">
    <input type="hidden" name="item_number" value="cod001">
    <input type="hidden" name="amount" value="30.90">
    <input type="hidden" name="tax" value="3">
    <input type="hidden" name="quantity" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="country" value="PA">
    <input type="hidden" name="return" value="[URL DE RETORNO AL TERMINAR LA TRANSACCION]">
    <input type='hidden' name='notify_url' value= '[URL DE NOTIFICACION]'>
    <input type='hidden' name='cancel_return' value= '[URL DE CANCELACION]'>
    <input type="submit" name="submit" value="Pagar con Paypal ">
</form>
-->
<!--
<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="sb-ytpyc33388420@business.example.com">

    <input type="hidden" name="item_name" value="Compra Total">
    <input type="hidden" name="item_number" value="xcompratotal001">
    <input type="hidden" name="amount" value="{ number_format($total * (1 + $tax), 2, '.', '') }}">
    <input type="hidden" name="quantity" value="1">

    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="country" value="PA">

    <input type="hidden" name="return" value="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_return">
    <input type="hidden" name="cancel_return" value="https://www.sandbox.paypal.com/cancel">
    <input type="hidden" name="notify_url"
        value="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_notify-validate">


    <input type="submit" value="Pagar con PayPal">
</form>
-->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal con Formulario</title>
    <link rel="stylesheet" href="{{ asset('asset_css/payment_paypal.css') }}">
</head>

<body>
    <button id="openModal">Abrir Formulario</button>
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal">
            <button class="close-btn" id="closeModal">&times;</button>
            <h2>Compra</h2>
            <form id="form" target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr"
                method="post">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="sb-ytpyc33388420@business.example.com">

                <input type="hidden" name="item_name" value="Compra Total">
                <input type="hidden" name="item_number" value="xcompratotal001">
                <input type="hidden" name="amount" value="{ number_format($total * (1 + $tax), 2, '.', '') }}">
                <input type="hidden" name="quantity" value="1">

                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="country" value="PA">

                <input type="hidden" name="return"
                    value="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_return">
                <input type="hidden" name="cancel_return" value="https://www.sandbox.paypal.com/cancel">
                <input type="hidden" name="notify_url"
                    value="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_notify-validate">
                <input type="submit" value="Pagar con PayPal">
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const openModalBtn = document.getElementById('openModal');
        const closeModalBtn = document.getElementById('closeModal');
        const modalOverlay = document.getElementById('modalOverlay');

        // Abrir modal
        openModalBtn.addEventListener('click', () => {
            modalOverlay.classList.add('active');
        });

        // Cerrar modal
        closeModalBtn.addEventListener('click', () => {
            modalOverlay.classList.remove('active');
        });

        // Cerrar modal al hacer clic fuera de él
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                modalOverlay.classList.remove('active');
            }
        });

    </script>
</body>

</html>
