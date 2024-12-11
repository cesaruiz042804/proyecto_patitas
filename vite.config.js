import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; // Importa el plugin de Vue

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(), // Añade el plugin de Vue aquí
    ],
    resolve: {
        alias: {
            // Alias para usar la versión completa de Vue que soporta la compilación en tiempo de ejecución
            'vue': 'vue/dist/vue.esm-bundler.js',
        },
    },
});
