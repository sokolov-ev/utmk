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
        'aos.css',
        'frontend.css',
        'frontend/index.menu.css',
        'frontend/index.slider.css',
        'frontend/products.css',
        // имя скомпилированого файла
    ], 'public/css/styles.css');

    mix.styles([
        'AdminLTE/AdminLTE.css',
        'AdminLTE/skins/skin-blue.min.css',
        'JQueryTable/dataTables.bootstrap.css',
        'backend.css',
        // имя скомпилированого файла
    ], 'public/css/admin.css');

    mix.styles([
        'select2.css',
        // имя скомпилированого файла
    ], 'public/css/select2.css');

    mix.styles([
        'fileinput.css',
        // имя скомпилированого файла
    ], 'public/css/fileinput.css');


    // СКРИПТЫ ----------------------------------------
    mix.scripts('adminlte.js', 'public/js/adminlte.js');
    mix.scripts('mustache.js', 'public/js/mustache.js');
    mix.scripts('jquery-ui.js', 'public/js/jquery-ui.js');
    mix.scripts('admin.menu.js', 'public/js/menu.js');
    mix.scripts([
        'aos.js',
        'frontend.index.js',
    ], 'public/js/scripts.js');
    mix.scripts([
        'frontend.products.js',
        'jquery.twbsPagination.js',
    ], 'public/js/products.js');
    mix.scripts([
        'select2/select2.full.js',
        'select2/i18n/en.js',
        'select2/i18n/ru.js',
        'select2/i18n/uk.js',
        // имя скомпилированого файла
    ], 'public/js/select2.js');

    mix.scripts([
        'filestyle/plugins/canvas-to-blob.js',
        'filestyle/plugins/sortable.js',
        'filestyle/plugins/purify.js',
        'filestyle/fileinput.js',
        'filestyle/locales/ru.js',
        'filestyle/locales/uk.js',
        // имя скомпилированого файла
    ], 'public/js/fileinput.js');

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
        "css/select2.css",
        "js/adminlte.js",
        "js/jqueryTable.js",
        "js/mustache.js",
        "js/jquery-ui.js",
        "js/menu.js",
        "js/scripts.js",
        "js/select2.js",
        "css/fileinput.css",
        "js/fileinput.js",
        "js/products.js",
    ]);

    mix.browserSync({
        proxy: 'metallvsem.dev'
    });
});
