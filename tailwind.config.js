import { fontFamily as _fontFamily } from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export const content = [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/dist/js/**/*.js",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.vue",
];
darkMode: 'media'
export const corePlugins = {
    preflight: true,
};

export const theme = {
    extend: {
        fontFamily: {
            sans: ["Nunito", ..._fontFamily.sans],
        },
    },
};

export const plugins = [
    require("@tailwindcss/forms"),
    require("tw-elements/dist/plugin.cjs"),
];
