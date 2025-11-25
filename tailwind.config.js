import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue: {
                    50: '#e8f0fb',
                    100: '#d1e1f7',
                    200: '#a3c3ef',
                    300: '#75a5e7',
                    400: '#4787df',
                    500: '#2c75d1',
                    600: '#235ea7',
                    700: '#1a477d',
                    800: '#123053',
                    900: '#091829',
                },
            },
        },
    },

    plugins: [forms],
};
