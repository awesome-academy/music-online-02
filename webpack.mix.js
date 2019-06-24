const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.copy([
    'resources/js/mjs.js',
    'resources/js/dataTable.js',
    'resources/js/changeRole.js',
    'resources/js/search.js',
    'resources/js/comment.js',
    'resources/js/review_image.js',
    'resources/js/favorite.js',
], 'public/custom-js');
