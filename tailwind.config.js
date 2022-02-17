const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
    ],

    theme: {

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],

            },
            colors: {
                'dark': '#061F2A',
                'tide': '#BDB6B3',
                'hoki': '#5E829B',
                'gothic': '#7598AE'
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
