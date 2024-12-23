const { addDynamicIconSelectors } = require('@iconify/tailwind');

module.exports = {
    content: [
        "./**/*.php",
        "./Blocks/**/*.php",
        "./Blocks/resources/templates/*.php",
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
    safelist: [
        'size-2',
        'size-3',
        'size-4',
        'size-5',
        'size-6',
        'size-7',
        'size-8',
        'size-9',
        'size-10',
    ],
    plugins: [
        addDynamicIconSelectors(),
    ],
}