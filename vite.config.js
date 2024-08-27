import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',  // Adjust this path if needed
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
