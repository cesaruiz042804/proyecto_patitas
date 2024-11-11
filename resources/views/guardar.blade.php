<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pago con Stripe</title>
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="{{ asset('asset_css/payment_stripe.css') }}">
</head>

<body>
    <div class="container">
        <form action="{{ route('charge_stripe') }}" method="POST" id="payment-form" class="payment-form">
            @csrf
            <div class="container-card">
                <label for="card-element">Tarjeta de crédito o débito</label>
                <div id="card-element"></div>
                <div id="card-errors" role="alert"></div>
            </div>
            <button type="submit">Pagar</button>
        </form>
    </div>

    <script>
        var stripe = Stripe('{{ config('services.stripe.key') }}');
        var elements = stripe.elements();

        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        var cardElement = elements.create('card', { style: cardStyle });
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    // Muestra el error en el formulario
                    document.getElementById('card-errors').textContent = result.error.message;
                } else {
                    // Inserta el token en el formulario
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);

                    // Envia el formulario
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>
