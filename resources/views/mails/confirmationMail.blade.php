<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Patitas al rescate</title>
</head>

<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; color: #4b4b4e;">
    <div
        style="background-color: #ffffff; max-width: 100%; margin: 20px auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <div style="background-color: #6c63ff; padding: 20px; color: white; text-align: center;">
            <h2 style="margin: 0;">Confirma tu cuenta</h2>
        </div>
        <div style="padding: 20px; line-height: 1.5;">
            <div style="justify-content: center; align-content: center; text-align: center;">
                <p style="margin: 0; padding: 10px 0; font-size: 100px;">
                    <img src="{{ $message->embed(public_path('img_public/img_check.png')) }}" alt="Check Icon"
                        width="100" height="100" style="display: block; margin: 0 auto;">
                </p>
                <p style="font-size: 16px; margin: 10px 0;">Hola, gracias por registrarte en Patitas al rescate. Para
                    activar tu cuenta, por favor haz clic en el siguiente enlace:</p>
            </div>
            <div style="justify-content: center; align-content: center; text-align: center;">
                <a href="{{ url('confirm-email/' . $token) }}"
                    style="display: inline-block; background-color: #6c63ff; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px; font-size: 16px; margin-top: 20px; transition: background-color 0.3s ease;">
                    Activar cuenta
                </a>
                <!--
                <p>"{ $token }}"</p>
                -->
                <hr
                    style="height: 2px; background: linear-gradient(to right, #f7f5ff, #434372); width: 80%; margin: 20px auto;">
                <p style="font-size: 16px; margin: 10px 0;">Si no solicitaste este correo, puedes ignorarlo.</p>
            </div>
        </div>
    </div>
    <footer
        style="background-color: #6c63ff; text-align: center; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.945); display: flex; width: 100%; flex-direction: column; min-height: 20vh; color: #f7f5ff; justify-content: center; justify-items: center; align-items: center; height: auto; overflow-x: hidden;">
        <div class="container-foot"
            style="display: flex; flex-direction: column; width: 100%; min-height: 10vh; height: auto;">

            <div class="item-foot"
                style="display: flex; flex-direction: column; justify-content: center; width: 100%; align-items: center; justify-items: center; padding: 8px 0; flex-wrap: wrap;">
                <!--
                <img src="{{ $message->embed(public_path('recursos_donation/img_flayers.jpg')) }}" alt="Check Icon" width="30px" height="20px">
                -->
                <!--
                <div class="item-foot" style="display: flex; justify-content: center; align-items: center; padding: 8px 0;">
                    <div class="foot-img" style="display: flex; align-items: center;">
                        <img src="{ $message->embed(public_path('img_public/img_whatsapp.png')) }}" alt="Check Icon" width="30px" height="20px">
                        <img src="{ $message->embed(public_path('img_public/img_instagram.png')) }}" alt="Check Icon" width="30px" height="20px">
                        <img src="{ $message->embed(public_path('img_public/img_facebook.png')) }}" alt="Check Icon" width="30px" height="20px">
                        <img src="{ $message->embed(public_path('img_public/img_twitter.png')) }}" alt="Check Icon" width="30px" height="20px">
                        <img src="{ $message->embed(public_path('img_public/img_youtube.png')) }}" alt="Check Icon" width="30px" height="20px">
                    </div>
                </div>
            </div>
        -->

            </div>

            <hr class="divider"
                style="height: 2px; background: linear-gradient(to right, #ffffff, #686884); width: 80%; margin: 20px auto;">

        </div>

    </footer>

=======
    <title>Patitas al rescate</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #4b4b4e;
        }

        .email-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .email-header {
            background-color: #7a7ac0;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .email-body {
            padding: 20px;
            line-height: 1.5;
        }

        .email-body h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .email-body p {
            font-size: 16px;
            margin: 10px 0;
        }

        .btn {
            display: inline-block;
            background-color: #6c63ff; /* Color más atractivo para el botón */
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #5a52d0; /* Color más oscuro al pasar el mouse */
        }

        .email-footer {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            color: #777;
            font-size: 14px;
            border-top: 1px solid #e2e2e2; /* Línea para separar el pie de página */
        }

        .email-footer a {
            color: #403192;
            text-decoration: none;
        }

        .email-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Confirma tu cuenta</h2>
        </div>
        <div class="email-body">
            <p>Hola,</p>
            <p>Gracias por registrarte en Patitas al rescate. Para activar tu cuenta, por favor haz clic en el siguiente enlace:</p>
            <a href="{{ url('confirm-email/' . $token) }}" class="btn">Confirmar cuenta</a>
            <p>Si no solicitaste este correo, puedes ignorarlo.</p>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Patitas al rescate. Todos los derechos reservados.</p>
            <p>Si tienes alguna pregunta, no dudes en <a href="mailto:support@patitas_al_rescate.com">contactarnos</a>.</p>
        </div>
    </div>
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
</body>

</html>
