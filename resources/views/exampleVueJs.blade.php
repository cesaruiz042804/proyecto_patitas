<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + Vue</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('partials.navbar')

    <main>
        <div id="app" style="height: 100vh; background-color:brown;">
            <example-component></example-component>
        </div>
    </main>

    @include('partials.footer')

</body>

</html>
