let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
	  "resources/assets/css/icomoon.css",
	  "resources/assets/css/bootstrap.css",
	  "resources/assets/css/core.css",
	  "resources/assets/css/components.css",
	  "resources/assets/css/colors.css"
	], "public/css/app.css")
	 
	.scripts([
	  "resources/assets/js/theme/jquery.min.js",
	  "resources/assets/js/theme/bootstrap.min.js",
	  "resources/assets/js/theme/nicescroll.min.js",
	  "resources/assets/js/theme/drilldown.js",
	  "resources/assets/js/theme/app.js"
	],'public/js/core.js');
