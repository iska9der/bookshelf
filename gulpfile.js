var elixir = require('laravel-elixir');

var paths = {
    'jquery': './vendor/bower_components/jquery/',
    'bootstrap': '/vendor/bower_components/bootstrap-sass-official/assets/'
};

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
    mix.sass('app.scss', 'public/css/', {includePaths: [paths.bootstrap + 'stylesheets/']})
        .copy(
            'vendor/bower_components/jquery/dist/jquery.min.js',
            'public/js/vendor/jquery.js'
        )
        .copy(
            'vendor/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
            'public/js/vendor/bootstrap.js'
        )
        .copy(
            'vendor/bower_components/font-awesome/css/font-awesome.min.css',
            'public/css/vendor/font-awesome.css'
        )
        .copy(
            'vendor/bower_components/font-awesome/fonts',
            'public/css/fonts'
        )
        .copy(
            'vendor/bower_components/normalize-css/normalize.css',
            'public/css/vendor/normalize.css'
        );

});
