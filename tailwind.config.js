import forms from '@tailwindcss/forms';

const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        black: colors.slate,
        white: colors.white,
        'teal': {
            DEFAULT: '#0099cc',
            '50': '#f0faff',
            '100': '#e0f5fe',
            '200': '#b9ecfe',
            '300': '#7cdffd',
            '400': '#36d0fa',
            '500': '#0cbaeb',
            '600': '#0099cc',
            '700': '#0178a3',
            '800': '#066586',
            '900': '#0b536f',
            '950': '#07354a',
        },
        'blue': {
            DEFAULT: '#006699',
            '50': '#f0f9ff',
            '100': '#dff3ff',
            '200': '#b9e7fe',
            '300': '#7bd7fe',
            '400': '#34c2fc',
            '500': '#0aaced',
            '600': '#0089cb',
            '700': '#006699',
            '800': '#055d87',
            '900': '#0a4c70',
            '950': '#07304a',
        },
        'lime': {
            DEFAULT: '#00cc00',
            '50': '#efffee',
            '100': '#d8ffd7',
            '200': '#b3ffb2',
            '300': '#78ff76',
            '400': '#34f533',
            '500': '#0ade09',
            '600': '#00cc00',
            '700': '#049105',
            '800': '#0a710b',
            '900': '#0a5d0c',
            '950': '#003402',
        },
        'orange': {
            DEFAULT: '#ff6600',
            '50': '#fff8ec',
            '100': '#fff0d3',
            '200': '#ffdca5',
            '300': '#ffc26d',
            '400': '#ff9d32',
            '500': '#ff7f0a',
            '600': '#ff6600',
            '700': '#cc4902',
            '800': '#a1390b',
            '900': '#82310c',
            '950': '#461604',
        },
    },
        extend: {
        },
    },

    plugins: [forms],
};
