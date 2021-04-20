module.exports = {
    purge: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: {
            underhold: {
                DEFAULT: "08C447",
            },
        },
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
