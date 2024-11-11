import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(), // Добавляем плагин Vue
    ],
    resolve: {
        alias: {
            '@': '/resources/js', // Задаем алиас для удобства
        },
    },
});

