/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
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
