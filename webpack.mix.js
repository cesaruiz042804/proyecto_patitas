const mix = require('laravel-mix');

// Compilar el archivo JS y habilitar Vue.js
mix.js('resources/js/app.js', 'public/js')
    .vue()  // Habilitar soporte para Vue.js
    .sass('resources/sass/app.scss', 'public/css') // Si usas Sass (opcional)
    .version();  // Opcional: Para cache busting en producción
