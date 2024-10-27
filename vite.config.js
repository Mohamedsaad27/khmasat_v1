import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import react from '@vitejs/plugin-react';
import 'dotenv/config';

export default defineConfig({
    build: {
        minify: process.env.APP_ENV === 'production' ? 'esbuild' : false,
        cssMinify: process.env.APP_ENV === 'production',
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.jsx',
            ],
            refresh: true,
        }),
        // react(),
    ],
    server: {
        mimeTypes: {
            'application/javascript': ['js', 'jsx'],
        },
        host: "khmasat.treasure-academy.com",
        // port: 5173, // or your desired port
        https: true, // Use true if your site is HTTPS
    },
});
