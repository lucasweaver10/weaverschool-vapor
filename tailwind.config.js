import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import aspectRatio from '@tailwindcss/aspect-ratio';
import typography from '@tailwindcss/typography';
import colors from '@tailwindcss/colors';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            typography: {
                DEFAULT: {
                    css: {
                        '--tw-prose-invert-body': '#e5e7eb',                        
                        '--tw-prose-bold': 'inherit',
                    },
                },
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            hover: ['responsive', 'group-hover', 'focus-within', 'first', 'last'],
            scale: {
                '110': '1.1',
              }
        },
    },
    plugins: [forms, aspectRatio, typography],
};
