<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donación</title>
    <link rel="stylesheet" href="{{ asset('asset_css/donation.css') }}">
<<<<<<< HEAD
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
=======
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
</head>

<body>

    @include('partials.navbar')
<<<<<<< HEAD
    
=======

>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
    <main>
        <div class="container">
            <div class="container-target">
                <div class="container-img">
<<<<<<< HEAD
=======
                    <!-- 
                        <img src="{{ asset('recursos_donation/img_flayers.jpg') }}" alt="image">
                    -->
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
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
