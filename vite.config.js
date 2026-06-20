import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/frontend/public.js',
                'resources/js/frontend/home.js',
                'resources/js/frontend/portfolios.js',
                'resources/js/frontend/posts-archive.js',
                'resources/js/frontend/single-post.js',
                'resources/js/frontend/404.js',
                'resources/js/frontend/dashboard.js',
                'resources/js/frontend/dashboard-index.js',
                'resources/js/frontend/dashboard-add-post.js',
                'resources/js/frontend/dashboard-posts.js',
                'resources/js/frontend/dashboard-categories.js',
                'resources/js/frontend/dashboard-comments.js',
                'resources/js/frontend/dashboard-page-settings.js',
                'resources/js/frontend/dashboard-users.js',
                'resources/js/frontend/dashboard-account-settings.js',
                'resources/js/frontend/auth.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '127.0.0.1',
        port: 5173,
        strictPort: true,
        hmr: {
            host: '127.0.0.1',
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
