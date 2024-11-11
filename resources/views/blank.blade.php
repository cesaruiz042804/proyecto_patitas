<!-- blank.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Confirmación</title>
</head>

<body>

    <style>
        /* Centrar el mensaje */
        .alert {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            width: 80%;
            padding: 10px;
            text-align: center;
            background-color: #e9f5ff;
            border: 1px solid #b6e0fe;
            border-radius: 5px;
        }
    </style>

    @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
        <div>
            <a href="{{ route('home') }}"></a>
        </div>
    @endif

</body>

</html>

<!--

1. Como subir los archivos al servidor.
2. Como hacer la parte de las imagenes. Donde se van a guardar, como se
   hace para llamar la ruta y mostrar dichas imagenes (de manera dinámica).
3. Técnicas para bajar el peso de una imagen.
4. Cuando usar metodo GET, POST, PUT, DELETE.
5. Que pasa si tengo que hacer un cambio de manera local, debo subir el proyecto
   nuevamente o hay una manera más rápida y segura de hacerla.
6. Tips avanzados que podemos poner en práctica en este proyecto.
7. Que motor de base de datos implementar.
8. Cual es la manera más sencilla de ejecutar colas sin necesidad de
   escribir el comando en la terminal (por ejemplo al momento de enviar email).
9. Cómo optimizo el SEO de la aplicación.


-->
