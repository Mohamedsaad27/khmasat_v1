import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from 'react';
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
        react(),
    ],
    server: {
        mimeTypes: {
            'application/javascript': ['js', 'jsx'],
        },
        host: "178.16.128.227", // Forces Vite to use IPv4
        port: 5173
    },
});
