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

    mix.styles([
        'admin.css',
        'AdminLTE.css',
        'skins/skin-blue.min.css',
    ]).version('public/css/all.css');

    mix.scripts([
        'app.js'
    ]).version('public/js/all.js');

    //version control & cache
    mix.version(["css/all.css", "js/all.js"]);

    mix.browserSync({
        proxy: 'metallvsem.dev'
    });
});
