const mix = require('laravel-mix');
const {PurgeCSSPlugin} = require("purgecss-webpack-plugin");
const glob = require('glob-all');
const path = require('path');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copyDirectory('./node_modules/@splidejs/splide/dist', 'public/assets/libs/splidejs');
mix.copyDirectory('./node_modules/jquery/dist', 'public/assets/libs/jquery');
mix.copyDirectory('./node_modules/@fancyapps/fancybox/dist', 'public/assets/libs/fancybox');
mix.copyDirectory('./node_modules/@fortawesome/fontawesome-free', 'public/assets/libs/fontawesome');
mix.copyDirectory('./node_modules/alpinejs/dist/cdn.js', 'public/assets/libs/alpinejs');
mix.copyDirectory('./node_modules/filepond', 'public/assets/libs/filepond');
mix.copyDirectory('./node_modules/filepond-plugin-file-validate-type', 'public/assets/libs/filepond/plugins/file-validate-type');
mix.copyDirectory('./node_modules/filepond-plugin-file-validate-size', 'public/assets/libs/filepond/plugins/file-validate-size');
mix.copyDirectory('./node_modules/filepond-plugin-image-validate-size', 'public/assets/libs/filepond/plugins/image-validate-size');
mix.copyDirectory('./node_modules/filepond-plugin-image-preview', 'public/assets/libs/filepond/plugins/image-preview');
mix.copyDirectory('./node_modules/select2', 'public/assets/libs/select2');
mix.copyDirectory('./node_modules/sweetalert2', 'public/assets/libs/sweetalert2');



mix.js('resources/js/app.js', 'public/assets/js')
    .minify('public/assets/js/app.js')
    .sass('resources/scss/app.scss', 'public/assets/css')
    .webpackConfig({
        //  plugins: [
        //      new PurgeCSSPlugin({
        //          paths: glob.sync([
        //              path.join(__dirname, 'resources/views/**/*.blade.php'),
        //          ])
        //      })
        //  ]
    })
    .minify('public/assets/css/app.css');

mix.sass('resources/scss/login.scss', 'public/assets/css')
    .minify('public/assets/css/login.css');

mix.postCss('resources/css/filament.css', 'public/css', [
    require('tailwindcss'),
]);
