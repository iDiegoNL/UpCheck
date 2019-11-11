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

mix.styles([
    'public/admin/assets/css/dashboard.css',
    'public/css/font-awesome.min.css',
    'public/css/hint.min.css',
], 'public/css/all.css');

mix.styles([
    'public/home/css/theme.css',
    'public/home/css/aos.css',
], 'public/home/css/all.css');
