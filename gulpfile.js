var elixir = require('laravel-elixir');
require('laravel-elixir-minify-html');
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
    // mix.html(
    //     'storage/framework/views/*', 
    //     'storage/framework/views/', 
    //     {
    //         collapseWhitespace: true, 
    //         removeAttributeQuotes: true, 
    //         removeComments: true, 
    //         minifyJS: true
    //     });

    // СТИЛИ ----------------------------------------
    mix.styles([
        'animate.css',
        'magnific-popup.css',
        'frontend.css',
        'frontend/index.menu.css',
        'frontend/index.slider.css',
        'frontend/index.page.css',
        'frontend/about.us.css',
        'frontend/products.css',
        'frontend/footer.css',
        'frontend/inform.css',
        'jquery.rateyo.css',
    ], 'public/css/styles.min.css');

    mix.styles([
        'AdminLTE/AdminLTE.css',
        'AdminLTE/skins/skin-blue.min.css',
        'JQueryTable/dataTables.bootstrap.css',
        'backend.css',
    ], 'public/css/admin.min.css');

    mix.styles([
        'select2.css',
    ], 'public/css/select2.min.css');

    mix.styles([
        'fileinput.css',
    ], 'public/css/fileinput.min.css');


    // СКРИПТЫ ----------------------------------------
    
    mix.scripts('clipboard.js', 'public/js/clipboard.min.js');
    mix.scripts('adminlte.js', 'public/js/adminlte.min.js');
    mix.scripts('mustache.js', 'public/js/mustache.min.js');
    mix.scripts('jquery-ui.js', 'public/js/jquery-ui.min.js');
    mix.scripts('admin.menu.js', 'public/js/menu.min.js');
    mix.scripts('jquery.magnific-popup.js', 'public/js/magnific.min.js');
    mix.scripts('jquery.rateyo.js', 'public/js/jquery.rateyo.js');

    mix.scripts([
        'mustache.js',
        'wow.js',
        'parallax.js',
        'frontend.index.js',
    ], 'public/js/scripts.min.js');
    mix.scripts([
        'frontend.products.js',
        'jquery.twbsPagination.js',
    ], 'public/js/products.min.js');
    mix.scripts([
        'select2/select2.full.js',
        'select2/i18n/en.js',
        'select2/i18n/ru.js',
        'select2/i18n/uk.js',
    ], 'public/js/select2.min.js');

    mix.scripts([
        'filestyle/plugins/canvas-to-blob.js',
        'filestyle/plugins/sortable.js',
        'filestyle/plugins/purify.js',
        'filestyle/fileinput.js',
        'filestyle/locales/ru.js',
        'filestyle/locales/uk.js',
    ], 'public/js/fileinput.min.js');

    mix.scripts([
        'jqueryTable/jquery.dataTables.js',
        'jqueryTable/dataTables.bootstrap.js',
        'jqueryTable/jquery.slimscroll.js',
        'jqueryTable/fastclick.js',
    ], 'public/js/jqueryTable.min.js');

    mix.version([
        'css/styles.min.css',
        'css/admin.min.css',
        'css/select2.min.css',
        'js/adminlte.min.js',
        'js/jqueryTable.min.js',
        'js/mustache.min.js',
        'js/jquery-ui.min.js',
        'js/menu.min.js',
        'js/scripts.min.js',
        'js/select2.min.js',
        'css/fileinput.min.css',
        'js/fileinput.min.js',
        'js/products.min.js',
        'js/magnific.min.js',
        'js/clipboard.min.js',
        'js/jquery.rateyo.js',
    ]);

    // mix.browserSync({
    //     proxy: 'metallvsem.dev'
    // });
});
