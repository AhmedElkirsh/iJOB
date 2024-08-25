import { defineConfig } from 'vite';
import laravel from 'vite-plugin-laravel';

export default defineConfig({
    plugins: [
        laravel(),
    ],
    build: {
        outDir: 'public/build',  // Ensure this matches your expected output directory
        manifest: true,          // Ensure manifest is enabled
    },
});
