import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/home.css',
                'resources/css/shop_page.css',
                'resources/css/product_page.css',
                'resources/css/cart_page.css',
                'resources/css/checkout.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
