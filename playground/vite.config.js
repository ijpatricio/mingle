import { defineConfig } from 'vite'
import tailwindcss from "@tailwindcss/vite"
import laravel from 'laravel-vite-plugin'
import react from '@vitejs/plugin-react'
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
            input: ['resources/css/app.css', 'resources/js/app.tsx'],
            ssr: 'resources/js/ssr.jsx',
            refresh: true,
        }),
        react(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        tailwindcss(),
    ],
    esbuild: {
        jsx: 'automatic',
    },
})
