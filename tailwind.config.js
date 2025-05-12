import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'media', // Respects system preferences

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'dark-bg': {
                    DEFAULT: '#1a1a21', // Dark blue-gray, easier on eyes than pure black
                    light: '#252530', // Lighter variant for cards, containers
                    lighter: '#303045', // Even lighter for hover states
                },
                'dark-text': {
                    DEFAULT: '#e6e6e6', // Slightly off-white for better contrast
                    muted: '#a0a0b0', // Muted text for less important information
                    accent: '#b8c0e0', // Slightly blue-tinted accent text
                },
            },
            backgroundColor: {
                dark: '#1a1a21', // Main dark background
            },
            textColor: {
                dark: '#e6e6e6', // Main dark mode text
            },
        },
    },

    plugins: [forms],
};
