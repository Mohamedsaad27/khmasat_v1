import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.jsx',
            ],
            refresh: true,
        }),
    ],
    server: {
        mimeTypes: {
            'application/javascript': ['js', 'jsx'],
        },
        host: '127.0.0.1', // Forces Vite to use IPv4
        port: 5173
    },
});
