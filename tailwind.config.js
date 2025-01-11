import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const plugin = require('tailwindcss/plugin');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
        plugin(function({ addUtilities }) {
            addUtilities({
                '.btn-primary': {
                    '@apply text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none': {},
                },
                '.btn-success': {
                    '@apply text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none': {},
                },
                '.btn-danger': {
                    '@apply text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none': {},
                },
                '.btn-warning': {
                    '@apply text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none': {},
                },
                '.btn-action-success': {
                    '@apply w-8 h-8 bg-green-100 text-green-600 rounded-full inline-flex items-center justify-center': {},
                },
                '.btn-action-danger': {
                    '@apply w-8 h-8 bg-red-100 text-red-600 rounded-full inline-flex items-center justify-center': {},
                },
                '.badge-success': {
                    '@apply bg-green-100 text-green-800 text-xs font-medium px-4 py-2 rounded-full': {},
                },
                '.badge-danger': {
                    '@apply bg-red-100 text-red-800 text-xs font-medium px-4 py-2 rounded-full': {},
                },
                '.badge-warning': {
                    '@apply bg-yellow-100 text-yellow-800 text-xs font-medium px-4 py-2 rounded-full': {},
                },
                '.form-label': {
                    '@apply block mb-2 text-base font-medium text-gray-900': {},
                },
                '.form-input': {
                    '@apply bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5': {},
                },
                '.form-input-file': {
                    '@apply w-full overflow-clip rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:mr-4 file:cursor-pointer file:border-none file:bg-gray-50 file:px-4 file:py-2 file:font-medium file:text-gray-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75': {},
                },
            });
        })
    ],
};
