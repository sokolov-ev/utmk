<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// БЕКЕНД
Route::get('/administration/login','Adminauth\AuthController@showLoginForm');
Route::post('/administration/login','Adminauth\AuthController@postLogin');

Route::group(['middleware' => ['adminAuth']], function () {

    Route::get('/administration/logout','Adminauth\AuthController@logout');
    Route::get('/administration', 'Backend\EmployeeController@view');

// CRUD продукции и изображений продукции
    Route::get('/administration/products', 'Backend\ProductsController@index');
    Route::post('/administration/products/filtering', 'Backend\ProductsController@filtering');

    Route::get('/administration/products/get/{id}', 'Backend\ProductsController@getProduct');

    Route::get('/administration/product/add', 'Backend\ProductsController@addForm');
    Route::post('administration/product/add', 'Backend\ProductsController@add');

    Route::get('/administration/product/edit/{id}', 'Backend\ProductsController@editForm');
    Route::put('/administration/product/edit/{id}', 'Backend\ProductsController@edit');

    Route::delete('/administration/products', 'Backend\ProductsController@delete');

    Route::get('/administration/product/img/download/{id}', 'Backend\ProductsController@downloadImg');
    Route::post('/administration/product/img/sort', 'Backend\ProductsController@sortImg');
    Route::post('/administration/product/img/delete', 'Backend\ProductsController@deleteImg');

    Route::group(['middleware' => 'adminPermision:Admin,Moderator'], function() {
    // CRUD заказов
        Route::get('/administration/orders', 'Backend\OrdersController@index');
        Route::post('/administration/orders/filtering', 'Backend\OrdersController@filtering');
        Route::get('/administration/orders/view/{id}', 'Backend\OrdersController@view');
        Route::post('/administration/orders/change-product', 'Backend\OrdersController@changeProduct');
        Route::post('/administration/orders/delete', 'Backend\OrdersController@deleteProduct');
        Route::get('/administration/orders/accept/{id}', 'Backend\OrdersController@accept');
        Route::get('/administration/orders/closed/{id}', 'Backend\OrdersController@closed');

    });

    Route::group(['middleware' => 'adminPermision:Admin'], function() {

        Route::get('/administration/orders/edit', 'Backend\OrdersController@editForm');

    // CRUD Клиенты сайта
        Route::get('/administration/clients', 'Backend\ClientsController@index');
        Route::put('/administration/clients', 'Backend\ClientsController@edit');
        Route::delete('/administration/clients', 'Backend\ClientsController@delete');
        Route::post('/administration/clients/filtering', 'Backend\ClientsController@filtering');

    // CRUD Менеджеры/Модераторы админки
        Route::get('/administration/moderators/{id?}', 'Adminauth\AuthController@moderators');
        Route::post('/administration/moderator', 'Adminauth\AuthController@createModerator');
        Route::put('/administration/moderator', 'Adminauth\AuthController@editModerator');
        Route::delete('/administration/moderator', 'Adminauth\AuthController@deleteModerator');
    });

    Route::group(['middleware' => 'adminPermision:Admin,SEO'], function() {

        Route::get('/administration/baners', 'Backend\BanersController@index');
        Route::post('/administration/baners/store', 'Backend\BanersController@store');

        Route::get('/administration/spravka/sections', 'Backend\ReferenceController@allSections');

        Route::get('/administration/spravka/index/edit', 'Backend\ReferenceController@indexEditForm');
        Route::put('/administration/spravka/index/edit', 'Backend\ReferenceController@indexEdit');

        Route::post('/administration/spravka/section/sort', 'Backend\ReferenceController@sortSection');
        Route::post('/administration/spravka/section', 'Backend\ReferenceController@setSection');
        Route::get('/administration/spravka/delete/{id}', 'Backend\ReferenceController@delete');
        // slug overlap all spravka routs
        Route::get('/administration/spravka/{slug?}', 'Backend\ReferenceController@index');

    // CRUD Блог
        Route::post('/administration/blog/filtering', 'Backend\BlogController@filtering');
        Route::resource('/administration/blog', 'Backend\BlogController');

        Route::get('/administration/images', 'Backend\ImagesController@index');
        Route::post('/administration/images', 'Backend\ImagesController@store');
        Route::delete('/administration/images/{id}', 'Backend\ImagesController@destroy');
    //SMS
        Route::get('/administration/sms', 'Backend\ServiceController@sms');
        Route::post('/administration/sms/filtering', 'Backend\ServiceController@smsFiltering');

    //Прайслисты
        Route::get('/administration/price', 'Backend\PriceController@index');
        Route::post('/administration/price', 'Backend\PriceController@add');
        Route::get('/administration/price/load/{id}', 'Backend\PriceController@download');
        Route::get('/administration/price/delete/{id}', 'Backend\PriceController@delete');

        Route::post('/administration/documents', 'Backend\DocumentsController@add');
        Route::get('/administration/documents/load/{id}', 'Backend\DocumentsController@download');
        Route::get('/administration/documents/delete/{id}', 'Backend\DocumentsController@delete');

    // CRUD меню продукции сайта
        Route::get('/administration/menu', function(){
            return view('backend.site.menu');
        });
        // Получаем меню через ajax
        Route::get('/administration/menu/{language}', 'Backend\MenuController@getMenu');
        // Получаем пункт меню для редактирования
        Route::get('/administration/menu-item/{id}', 'Backend\MenuController@getMenuItem');
        // Добавляем пункт меню
        Route::post('/administration/menu', 'Backend\MenuController@actionMenu');
        // // Редактируем пункт меню
        Route::get('/administration/menu-clean/{id}', 'Backend\MenuController@cleanPrice');
        // Сохраняем струкетуру меню (порядок, вес, вложеность)
        Route::post('/administration/menu-sort', 'Backend\MenuController@sortMenu');
        // Удалить пункт меню
        Route::delete('/administration/menu', 'Backend\MenuController@deleteMenu');

    // Метатеги
        Route::get('/administration/metatags/{type?}/{slug?}', 'Backend\MetatagsContraller@index');
        Route::post('/administration/metatags', 'Backend\MetatagsContraller@add');

    // CRUD Офисы/Филиалы
        Route::get('/administration/offices/index/{id?}', 'Backend\OfficesController@getAll');
        Route::get('/administration/offices/get/{id}', 'Backend\OfficesController@getOffice');
        Route::get('/administration/offices/add', 'Backend\OfficesController@addFormOffice');
        Route::post('/administration/offices/add', 'Backend\OfficesController@addOffice');
        Route::get('/administration/offices/edit/{id}', 'Backend\OfficesController@editFormOffice');
        Route::post('/administration/offices/edit/{id}', 'Backend\OfficesController@editOffice');
        Route::delete('/administration/offices', 'Backend\OfficesController@deleteOffice');

    // Продукция Exel
        Route::get('/administration/exel', 'Backend\ImportController@index');
        Route::post('/administration/export', 'Backend\ImportController@export');
        Route::post('/administration/import', 'Backend\ImportController@import');
    });

});

// ФРОНТЕНД
Route::group(['middleware' => ['web', 'language-get']], function () {

    Route::group(['middleware' => ['language-get']], function () {

        Route::post('/call-me-back', 'Frontend\ServiceController@sendSms');
        Route::post('/contacts', 'Frontend\ServiceController@sendMessage');
        Route::get('/price/{id}', 'Frontend\ServiceController@priceDownload');
        // AJAX подгружаем меню
        Route::get('/catalog/get-catalog', 'Frontend\ProductsController@getMenu');
        // AJAX подгружаем продукцию (menu, name, city, page)
        Route::get('/catalog/get-products', 'Frontend\ProductsController@getCatalog');

    // КОРЗИНА
        Route::get('/products/get-order-data', 'Frontend\ProductsController@getShoppingCart');
        // добавить продукт в корзину
        Route::post('/products/product-to-cart', 'Frontend\ProductsController@setToCart');
        // изменить количество продукции в корзине
        Route::post('/products/change-count-products', 'Frontend\ProductsController@countProductCart');
        // удалить продукт из корзины
        Route::post('/products/remove-product-to-cart', 'Frontend\ProductsController@deleteProductCart');
        // сформировать заказ
        Route::post('/products/formed-order', 'Frontend\ProductsController@formedOrder');
        Route::post('/register', 'Auth\AuthController@register');
        // Password Reset Routes...
        Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
        Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
        Route::post('/password/reset', 'Auth\PasswordController@reset');
    // Authentication Routes...
        Route::post('/login', 'Auth\AuthController@login');
        Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

        Route::get('/products/rating/{id}', 'Frontend\ProductsController@getRating');
        Route::post('/products/rating/{id}', 'Frontend\ProductsController@setRating');
    });


    Route::group(['middleware' => ['language']], function () {

        Route::get('/network-of-offices', ['as' => 'network-of-offices', 'uses' => 'Frontend\IndexController@salesNetwork']);
        Route::get('/office/{slug}', ['as' => 'office', 'uses' => 'Frontend\IndexController@officeView']);

    // СПРАВОЧНАЯ ИНФОРМАЦИЯ (статика)

        Route::get('/', ['as' => 'index-page', 'uses' => 'Frontend\IndexController@index']);
        Route::get('/contacts', ['as' => 'contacts', 'uses' => 'Frontend\ServiceController@contacts']);
        Route::get('/price', ['as' => 'prices', 'uses' => 'Frontend\ServiceController@prices']);
        Route::get('/yutmk-energy', ['as' => 'about-us', 'uses' => 'Frontend\IndexController@aboutUs']);

        Route::get('/porezka', ['as' => 'porezka', 'uses' => 'Frontend\IndexController@porezka']);
        Route::get('/upakovka', ['as' => 'upakovka', 'uses' => 'Frontend\IndexController@upakovka']);
        Route::get('/dostavka', ['as' => 'dostavka', 'uses' => 'Frontend\IndexController@dostavka']);

        Route::get('/eksport-import-metallicheskih-izdelij', ['as' => 'eksport-import', 'uses' => 'Frontend\IndexController@eksportImport']);
        Route::get('/shirokij-eksport-import-mira', ['as' => 'shirokij-eksport-import', 'uses' => 'Frontend\IndexController@shirokijEksportImport']);
        Route::get('/nashi-obemy-prodazh', ['as' => 'nashi-obemy-prodazh', 'uses' => 'Frontend\IndexController@nashiProdazh']);
        Route::get('/ustojchivoe-razvitie-kak-cel', ['as' => 'ustojchivoe-razvitie', 'uses' => 'Frontend\IndexController@ustojchivoeRazvitie']);
        Route::get('/my-stremimsya-dlya-nashix-klientov', ['as' => 'stremimsya-dlya-klientov', 'uses' => 'Frontend\IndexController@stremimsyaDlyaKlientov']);
        Route::get('/kontrol-kachestva-produkcii', ['as' => 'kontrol-kachestva', 'uses' => 'Frontend\IndexController@kontrolKachestva']);
        Route::get('/stremitelno-menyayushchemsya-mire', ['as' => 'stremitelno-menyayushchemsya-mire', 'uses' => 'Frontend\IndexController@stremitelnoMenyayushchemsyaMire']);
        Route::get('/chto-novogo', ['as' => 'chto-novogo', 'uses' => 'Frontend\IndexController@chtoNovogo']);
        Route::get('/luchshie-prodavcy', ['as' => 'luchshie-prodavcy', 'uses' => 'Frontend\IndexController@luchshieProdavcy']);
        Route::get('/razvitie', ['as' => 'razvitie', 'uses' => 'Frontend\IndexController@razvitie']);
        Route::get('/nasha-politika', ['as' => 'nasha-politika', 'uses' => 'Frontend\IndexController@nashaPolitika']);
        Route::get('/nadezhnyj-partner-dlya-vashego-biznesa', ['as' => 'nadezhnyj-partner', 'uses' => 'Frontend\IndexController@nadezhnyjPartner']);
        Route::get('/karernye-vozmozhnosti', ['as' => 'karernye-vozmozhnosti', 'uses' => 'Frontend\IndexController@karernyeVozmozhnosti']);

        Route::get('/blog', ['as' => 'blog', 'uses' => 'Frontend\BlogController@index']);
        Route::get('/blog/{slug}', 'Frontend\BlogController@view');

        Route::get('/spravka', ['as' => 'spravka', 'uses' => 'Frontend\ReferenceController@index']);
        Route::get('/spravka/get-sections', 'Frontend\ReferenceController@referenceSection');
        Route::get('/spravka/{slug}', 'Frontend\ReferenceController@view')->where('slug', '.+?');

        Route::get('/products', ['as' => 'products-index', 'uses' => 'Frontend\ProductsController@index']);

        // Registration Routes...
        Route::get('/register', ['as' => 'register', 'uses' => 'Auth\AuthController@showRegistrationForm']);

        Route::group(['middleware' => ['authorized']], function () {
            Route::get('/my-room/cart', ['as' => 'my-cart', 'uses' => 'Frontend\UserController@cart']);
            Route::get('/my-room/formed-orders', ['as' => 'formed-orders', 'uses' => 'Frontend\UserController@formedOrders']);
        });

        $locale = Request::segment(1);

        if (in_array($locale, ['en', 'uk'])) {

            Route::group(['prefix' => $locale], function() {

                Route::get('/network-of-offices', ['as' => 'network-of-offices', 'uses' => 'Frontend\IndexController@salesNetwork']);
                Route::get('/office/{slug}', ['as' => 'office', 'uses' => 'Frontend\IndexController@officeView']);

            // СПРАВОЧНАЯ ИНФОРМАЦИЯ (статика)

                Route::get('/', ['as' => 'index-page', 'uses' => 'Frontend\IndexController@index']);
                Route::get('/contacts', ['as' => 'contacts', 'uses' => 'Frontend\ServiceController@contacts']);
                Route::get('/price', ['as' => 'prices', 'uses' => 'Frontend\ServiceController@prices']);
                Route::get('/yutmk-energy', ['as' => 'about-us', 'uses' => 'Frontend\IndexController@aboutUs']);

                Route::get('/porezka', ['as' => 'porezka', 'uses' => 'Frontend\IndexController@porezka']);
                Route::get('/upakovka', ['as' => 'upakovka', 'uses' => 'Frontend\IndexController@upakovka']);
                Route::get('/dostavka', ['as' => 'dostavka', 'uses' => 'Frontend\IndexController@dostavka']);

                Route::get('/eksport-import-metallicheskih-izdelij', ['as' => 'eksport-import', 'uses' => 'Frontend\IndexController@eksportImport']);
                Route::get('/shirokij-eksport-import-mira', ['as' => 'shirokij-eksport-import', 'uses' => 'Frontend\IndexController@shirokijEksportImport']);
                Route::get('/nashi-obemy-prodazh', ['as' => 'nashi-obemy-prodazh', 'uses' => 'Frontend\IndexController@nashiProdazh']);
                Route::get('/ustojchivoe-razvitie-kak-cel', ['as' => 'ustojchivoe-razvitie', 'uses' => 'Frontend\IndexController@ustojchivoeRazvitie']);
                Route::get('/my-stremimsya-dlya-nashix-klientov', ['as' => 'stremimsya-dlya-klientov', 'uses' => 'Frontend\IndexController@stremimsyaDlyaKlientov']);
                Route::get('/kontrol-kachestva-produkcii', ['as' => 'kontrol-kachestva', 'uses' => 'Frontend\IndexController@kontrolKachestva']);
                Route::get('/stremitelno-menyayushhemsya-mire', ['as' => 'stremitelno-menyayushhemsya-mire', 'uses' => 'Frontend\IndexController@stremitelnoMenyayushhemsyaMire']);
                Route::get('/chto-novogo', ['as' => 'chto-novogo', 'uses' => 'Frontend\IndexController@chtoNovogo']);
                Route::get('/luchshie-prodavcy', ['as' => 'luchshie-prodavcy', 'uses' => 'Frontend\IndexController@luchshieProdavcy']);
                Route::get('/razvitie', ['as' => 'razvitie', 'uses' => 'Frontend\IndexController@razvitie']);
                Route::get('/nasha-politika', ['as' => 'nasha-politika', 'uses' => 'Frontend\IndexController@nashaPolitika']);
                Route::get('/nadezhnyj-partner-dlya-vashego-biznesa', ['as' => 'nadezhnyj-partner', 'uses' => 'Frontend\IndexController@nadezhnyjPartner']);
                Route::get('/karernye-vozmozhnosti', ['as' => 'karernye-vozmozhnosti', 'uses' => 'Frontend\IndexController@karernyeVozmozhnosti']);

                Route::get('/blog', ['as' => 'blog', 'uses' => 'Frontend\BlogController@index']);
                Route::get('/blog/{slug}', 'Frontend\BlogController@view');
                Route::get('/spravka', ['as' => 'spravka', 'uses' => 'Frontend\ReferenceController@index']);
                Route::get('/spravka/get-sections', 'Frontend\ReferenceController@referenceSection');
                Route::get('/spravka/{slug}', 'Frontend\ReferenceController@view')->where('slug', '.+?');

                Route::get('/products', ['as' => 'products-index', 'uses' => 'Frontend\ProductsController@index']);

                // Registration Routes...
                Route::get('/register', ['as' => 'register', 'uses' => 'Auth\AuthController@showRegistrationForm']);

                Route::group(['middleware' => ['authorized']], function () {
                    Route::get('/my-room/cart', ['as' => 'my-cart', 'uses' => 'Frontend\UserController@cart']);
                    Route::get('/my-room/formed-orders', ['as' => 'formed-orders', 'uses' => 'Frontend\UserController@formedOrders']);
                });

            });
        }

        Route::get('{slug}', 'Frontend\RouteController@index')->where('slug', '.+?');

    });
});