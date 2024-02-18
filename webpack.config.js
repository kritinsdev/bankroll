const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyWebpackPlugin = require('copy-webpack-plugin');
const fs = require('fs');

module.exports = {
    mode: process.env.NODE_ENV,
    entry: {
        'theme-default': [
          './src/scss/colors/theme-default.scss'
        ],
        'main': [
            './src/scss/main.scss',
            './src/js/main.js',
        ],
        ...generateDynamicEntries('./Blocks'),
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
    },
    plugins: [
        new MiniCssExtractPlugin(),
        new CopyWebpackPlugin({
            patterns: [
                {from: "src/img", to: "img/"},
            ],
        }),
    ],
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader'
                ]
            },
            {
                test: /\.css$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    "css-loader"
                ],
            },
            {
                test: /\.m?js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
        ],
    },
    externals: {}
};

function generateDynamicEntries(folderPath) {
    const dynamicEntries = {};
    const folders = fs.readdirSync(folderPath);
    folders.forEach(folder => {
        const folderLowerCase = folder.toLowerCase();
        const scssEntryPath = path.resolve(folderPath, folder, 'resources', 'assets', 'style.scss').replace(/\\/g, '/');
        const jsEntryPath = path.resolve(folderPath, folder, 'resources', 'assets', 'script.js').replace(/\\/g, '/');
        
        if (fs.existsSync(scssEntryPath)) {
            dynamicEntries[folderLowerCase + '-css'] = scssEntryPath;
        }

        if (fs.existsSync(jsEntryPath)) {
            dynamicEntries[folderLowerCase + '-js'] = jsEntryPath;
        }
    });
    return dynamicEntries;
}

