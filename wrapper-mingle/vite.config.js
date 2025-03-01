import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import react from "@vitejs/plugin-react";
import path from "path";

import findMingles from "./vendor/ijpatricio/mingle/resources/js/autoImport.js";
const mingles = findMingles("resources/js");
// Optional: Output the mingles to the console, for a visual check
console.log("Auto-importing mingles:", mingles);

export default defineConfig({
    resolve: {
        alias: {
            "@mingle": path.resolve(
                __dirname,
                "/vendor/ijpatricio/mingle/resources/js"
            ),
        },
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/react-counter/index.js",
                "resources/js/vue-counter/index.js",
                "resources/css/filament/demo/theme.css",
            ],
            refresh: [...refreshPaths, "app/**", "resources/js/**"],
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
    ],
    server: {
        hmr: {
            host: "localhost",
        },
    },
});
