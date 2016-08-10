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

    // СТИЛИ ----------------------------------------
    mix.styles([
        'frontend.css',
        // имя скомпилированого файла
    ], 'public/css/styles.css');

    mix.styles([
        'AdminLTE/AdminLTE.css',
        'AdminLTE/skins/skin-blue.min.css',
        // 'JQueryTable/jquery.dataTables.css',
        'JQueryTable/dataTables.bootstrap.css',
        'backend.css',
        // имя скомпилированого файла
    ], 'public/css/admin.css');

    // СКРИПТЫ ----------------------------------------
    mix.scripts('adminlte.js', 'public/js/adminlte.js');
    mix.scripts('mustache.js', 'public/js/mustache.js');
    mix.scripts('jquery-ui.js', 'public/js/jquery-ui.js');

    mix.scripts([
        'jqueryTable/jquery.dataTables.js',
        'jqueryTable/dataTables.bootstrap.js',
        'jqueryTable/jquery.slimscroll.js',
        'jqueryTable/fastclick.js',
        // имя скомпилированого файла
    ], 'public/js/jqueryTable.js');

    mix.version([
        "css/styles.css",
        "css/admin.css",
        "js/adminlte.js",
        "js/jqueryTable.js",
        "js/mustache.js",
        "js/jquery-ui.js"
    ]);

    mix.browserSync({
        proxy: 'metallvsem.dev'
    });
});
