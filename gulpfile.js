var elixir = require('laravel-elixir');


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .copy(
            'vendor/bower_components/jquery/dist/jquery.min.js',
            'resources/assets/js/jquery.js'
        )
        .copy(
            'vendor/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
            'resources/assets/js/bootstrap.js'
        )
        .copy(
            'vendor/bower_components/font-awesome/css/font-awesome.min.css',
            'resources/assets/css/font-awesome.css'
        )
        .copy(
            'vendor/bower_components/font-awesome/fonts',
            'public/css/fonts'
        )
        .copy(
            'vendor/bower_components/normalize-css/normalize.css',
            'resources/assets/css/normalize.css'
        )
        .styles([
            "./public/css/app.css",
            "font-awesome.css",
            "normalize.css"
        ], "public/css/all.css")
        .scripts([
            "jquery.js",
            "bootstrap.js"
        ], "public/js/all.js");
});
