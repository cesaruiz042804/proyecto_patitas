<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</body>

</html>
