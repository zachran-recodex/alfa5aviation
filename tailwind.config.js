import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const plugin = require('tailwindcss/plugin');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'alfa5': {
                    '50': '#ebf6ff',
                    '100': '#dbedff',
                    '200': '#beddff',
                    '300': '#97c5ff',
                    '400': '#6da0ff',
                    '500': '#4c7dff',
                    '600': '#2c55ff',
                    '700': '#2042e2',
                    '800': '#1d3ab6',
                    '900': '#1a2d73',
                    '950': '#131f53',
                },
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
        plugin(function({ addUtilities }) {
            addUtilities({
                '.py-main': {
                    paddingTop: '2rem',
                    paddingBottom: '2rem',
                    '@screen sm': {
                        paddingTop: '3rem',
                        paddingBottom: '3rem',
                    },
                    '@screen lg': {
                        paddingTop: '4rem',
                        paddingBottom: '4rem',
                    }
                },
                '.container-main': {
                    '@apply container mx-auto px-4 sm:px-6 lg:px-8': {},
                },
                '.text-title': {
                    '@apply text-3xl sm:text-4xl font-normal mb-4': {},
                },
                '.text-title-8': {
                    '@apply text-3xl sm:text-4xl font-normal mb-8': {},
                },
                '.text-desc': {
                    '@apply text-xl sm:text-2xl text-justify font-light mb-4': {},
                },
            });
        })
    ],
};
