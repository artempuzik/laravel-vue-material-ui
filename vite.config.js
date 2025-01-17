import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import * as path from "path";

export default defineConfig({
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "./resources/js"),
            vue: 'vue/dist/vue.esm-bundler.js',

        },
    },
    plugins: [
        laravel({
            input: [
                "resources/js/main.ts",
                'resources/sass/app.scss',
            ],
            refresh: true,
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
    server: {
        watch: {
            usePolling: true,
        },
    }
});
