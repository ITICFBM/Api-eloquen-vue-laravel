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

/* mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
 */

mix.js('resources/assets/js/app.js','public/js')
.sass('resources/assets/sass/app.scss', '../resources/assets/css')
 //*se une el archivo de app.css de materialize con lo s estilos propios para crear un solo archivo con nombre app.css*
.styles([
  'resources/assets/css/toastr.css',
], 'public/css/app.css');
