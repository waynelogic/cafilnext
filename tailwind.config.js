/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'sans': ['Jost', 'sans-serif'],
                'serif': ['Playfair Display', 'serif'],
            },
            colors: {
                'silver' : {
                    'DEFAULT' : '#999'
                },
                'secondary' : {
                    'DEFAULT' : '#bf4800'
                },
                'primary': {
                    100: '#ece2d6',
                    200: '#f1eae0',
                    300: '#e5d8c3',
                    500: "#b99566",
                    900: "#2f1e16",
                    'DEFAULT': '#b99566'
                },
            },
            boxShadow: {
                'in': '0 0 0 1px #ebecec',
                'out' : '0px 4px 34px -19px rgb(0 0 0 / 38%)',
                'round' : '0px 5px 25px -2px rgb(0 0 0 / 5%)'
            },
        },
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '4rem',
                xl: '5rem',
                '2xl': '6rem',
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
    ],
}
