const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/litepie-datepicker/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'litepie-primary': colors.sky, // color system for light mode
                'litepie-secondary': colors.gray // color system for dark mode
            }
        },
        variants:{
            extend: {
                cursor: ['disabled'],
                textOpacity: ['disabled'],
                textColor: ['disabled']
              }
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
