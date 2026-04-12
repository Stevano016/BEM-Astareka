import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                // Font bawaan Laravel
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                // Font custom dari HTML kamu
                headline: ['Manrope', 'sans-serif'],
                body: ['Inter', 'sans-serif'],
                label: ['Inter', 'sans-serif'],
            },
            colors: {
                "primary": "#001e40",
                "primary-container": "#003366",
                "primary-fixed": "#d5e3ff",
                "primary-fixed-dim": "#a7c8ff",
                "on-primary": "#ffffff",
                "on-primary-container": "#799dd6",
                "on-primary-fixed": "#001b3c",
                "on-primary-fixed-variant": "#1f477b",
                "secondary": "#755b00",
                "secondary-container": "#ffd660",
                "secondary-fixed": "#ffe08e",
                "secondary-fixed-dim": "#eac24e",
                "on-secondary": "#ffffff",
                "on-secondary-container": "#755c00",
                "on-secondary-fixed": "#241a00",
                "on-secondary-fixed-variant": "#584400",
                "tertiary": "#001e42",
                "tertiary-container": "#003368",
                "tertiary-fixed": "#d6e3ff",
                "tertiary-fixed-dim": "#a8c8ff",
                "on-tertiary": "#ffffff",
                "on-tertiary-container": "#739de0",
                "on-tertiary-fixed": "#001b3d",
                "on-tertiary-fixed-variant": "#134684",
                "surface": "#f8f9ff",
                "surface-bright": "#f8f9ff",
                "surface-dim": "#cbdbf5",
                "surface-variant": "#d3e4fe",
                "surface-container-lowest": "#ffffff",
                "surface-container-low": "#eff4ff",
                "surface-container": "#e5eeff",
                "surface-container-high": "#dce9ff",
                "surface-container-highest": "#d3e4fe",
                "surface-tint": "#3a5f94",
                "on-surface": "#0b1c30",
                "on-surface-variant": "#43474f",
                "on-background": "#0b1c30",
                "background": "#f8f9ff",
                "outline": "#737780",
                "outline-variant": "#c3c6d1",
                "inverse-surface": "#213145",
                "inverse-on-surface": "#eaf1ff",
                "inverse-primary": "#a7c8ff",
                "error": "#ba1a1a",
                "error-container": "#ffdad6",
                "on-error": "#ffffff",
                "on-error-container": "#93000a",
            },
            borderRadius: {
                "DEFAULT": "0.125rem",
                "lg": "0.25rem",
                "xl": "0.5rem",
                "full": "0.75rem"
            }
        },
    },

    plugins: [
        forms,
        require('@tailwindcss/container-queries') // Plugin tambahan dari CDN kamu
    ],
};