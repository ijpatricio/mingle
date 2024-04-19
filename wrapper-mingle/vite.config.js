import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig({
    resolve: {
        alias: {
            "@mingle": path.resolve(__dirname, "/vendor/ijpatricio/mingle/resources/js"),
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/react-counter/index.js',
                'resources/js/vue-counter/index.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/**',
                'resources/js/**',
            ],
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
})
