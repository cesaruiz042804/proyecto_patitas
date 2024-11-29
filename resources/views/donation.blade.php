<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content='"Agenda fácilmente citas médicas para perros y gatos en nuestra plataforma. Promovemos la concientización sobre el cuidado responsable de los animales y ofrecemos servicios veterinarios de calidad. ¡Cuida a tu mascota con nosotros!"'>
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('asset_css/donation.css') }}">
    <title>Donación</title>
</head>

<body>

    @include('partials.navbar')
    
    <main>
        <div class="container">
            <div class="container-target">
                <div class="container-img">
                    <div class="container-form">
                        <div class="container-text">
                            <h1>Formulario de Donación</h1>
                            <p>"Dona ahora y da esperanza a un animalito." Los animales sin hogar dependen de personas
                                como tú. Tu generosidad les da una oportunidad de una nueva vida llena de amor y
                                cuidado. Gracias por tu apoyo.</p>
                        </div>
                        <form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="upload" value="1">
                            <input type="hidden" name="business" value="sb-ytpyc33388420@business.example.com">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="item_name" value="Donación">
                            <input type="hidden" name="item_number" value="000">
                            <input type="number" name="amount" value="1" min="1" class="quantity">
                            <input type="hidden" name="quantity" value="1">
                            <!-- URLs de retorno -->
                            <input type="hidden" name="return" value="{{ route('paypal.success.donation') }}">
                            <input type="hidden" name="notify_url" value="{{ route('paypal.notify.donation') }}">
                            <input type="hidden" name="cancel_return" value="{{ route('paypal.cancel.donation') }}">

                            <input type="submit" class="pay-button" value="Pagar con PayPal">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')

</body>

</html>
