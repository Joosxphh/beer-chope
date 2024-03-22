/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',

    ],
    safelist: [
        {
            pattern: /(bg|hover:bg|text)-(red|blue|green|yellow|pink|purple|orange)-(100|500|600|700|800)/,
        },
    ],
    theme: {
        extend: {
            spacing: {
                '18': '18rem',
            },
        },
    },
    plugins: [],
}
