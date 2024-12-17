import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; // Importa el plugin de Vue

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'], // Los archivos de entrada de Laravel
            refresh: true, // Habilita la recarga automática en el navegador
        }),
        vue(), // Añade el plugin de Vue aquí
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js', // Alias para usar la versión de Vue compatible con el bundler
        },
    },
});
