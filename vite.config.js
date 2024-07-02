import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/style.css",
                "resources/scss/style.scss",
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/main.js",
                "resources/js/lib/easing/easing.js",
                "resources/js/lib/easing/easing.min.js",
                "resources/js/lib/owlcarousel/owl.carousel.js",
                "resources/js/lib/owlcarousel/owl.carousel.min.js",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources/js"),
        },
    },
});
