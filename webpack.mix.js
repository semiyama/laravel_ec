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

mix.react('resources/js/app.js', 'public/js')
    .sass('resources/sass/common.scss', 'public/css')
    .sass('resources/sass/index.scss', 'public/css')
    .sass('resources/sass/category.scss', 'public/css')
    .sass('resources/sass/detail.scss', 'public/css')
    .sass('resources/sass/cart.scss', 'public/css')
    .sass('resources/sass/order.scss', 'public/css')
    .sass('resources/sass/admin/login.scss', 'public/css/admin')
    .sass('resources/sass/admin/home.scss', 'public/css/admin')
    .sass('resources/sass/admin/order_list.scss', 'public/css/admin')
    .sass('resources/sass/admin/order_detail.scss', 'public/css/admin')
    .sass('resources/sass/admin/item_list.scss', 'public/css/admin')
    .sass('resources/sass/admin/item_detail.scss', 'public/css/admin')
    ;
