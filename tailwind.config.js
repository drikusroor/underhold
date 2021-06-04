module.exports = {
    purge: {
        enabled: true,
        content: [
            "./storage/framework/views/*.php",
            "./resources/**/*.blade.php",
            "./resources/**/*.js",
            "./resources/**/*.vue",
        ],
    },
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                transparent: "transparent",
                current: "currentColor",
                blue: {
                    light: "#85d7ff",
                    DEFAULT: "#1fb6ff",
                    dark: "#009eeb",
                },
                pink: {
                    light: "#ff7ce5",
                    DEFAULT: "#ff49db",
                    dark: "#ff16d1",
                },
                gray: {
                    darkest: "#1f2d3d",
                    dark: "#3c4858",
                    DEFAULT: "#c0ccda",
                    light: "#e0e6ed",
                    lightest: "#f9fafc",
                },
                green: {
                    DEFAULT: "#08c447",
                },
                underhold: {
                    DEFAULT: "08C447",
                    red: {
                        DEFAULT: "#9E1814",
                    },
                    yellow: {
                        DEFAULT: "#EB9513",
                    },
                },
            },
        },
        variants: {
            extend: {},
        },
        plugins: [],
    },
};
