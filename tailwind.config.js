const { addDynamicIconSelectors } = require('@iconify/tailwind');

module.exports = {
    content: [
        "./**/*.php",
        "./**/**/*.php",
        "./src/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                'bankroll-primary': '#0e7490',
                'bankroll-secondary': '#09485e',
            },
        },
    },
    plugins: [
        addDynamicIconSelectors(),
    ],
}