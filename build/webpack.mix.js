let mix = require('laravel-mix');
const path = require("path");

mix.webpackConfig({
    externals: {
        jquery: "jQuery",
        bootstrap: true,
        vue: "Vue",
        moment: "moment",
    }
});

mix.setResourceRoot('./');
mix.setPublicPath('../themes/portfolio_theme');

mix
    .copyDirectory("node_modules/@fontsource/poppins", "../themes/portfolio_theme/css/fonts/poppins")
    .sass('../themes/portfolio_theme/css/presets/default/main.scss', '../themes/portfolio_theme/css/skins/default.css', {
        sassOptions: {
            includePaths: [
                path.resolve(__dirname, './node_modules/')
            ]
        }
    })
    .js('assets/themes/portfolio_theme/js/main.js', '../themes/portfolio_theme/js').vue()