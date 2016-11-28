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

Route::get('/testing','Frontend\TestController@index');

// БЕКЕНД

Route::get('/administration/login','Adminauth\AuthController@showLoginForm');
Route::post('/administration/login','Adminauth\AuthController@postLogin');

// Регал админа.
// Route::get('/administration/register','Adminauth\AuthController@showRegistrationForm');
// Route::post('/administration/register','Adminauth\AuthController@postRegister');

Route::group(['middleware' => ['adminAuth']], function () {

    Route::get('/administration/logout','Adminauth\AuthController@logout');
    Route::get('/administration', 'Backend\EmployeeController@view');

// CRUD продукции и изображений продукции
    Route::get('/administration/products', 'Backend\ProductsController@index');
    Route::get('/administration/products/get/{id}', 'Backend\ProductsController@getProduct');
    Route::get('/administration/products/view', 'Backend\ProductsController@view');
    Route::get('/administration/product/add', 'Backend\ProductsController@addForm');
    Route::post('administration/product/add', 'Backend\ProductsController@add');
    Route::get('/administration/product/edit/{id}', 'Backend\ProductsController@editForm');
    Route::put('/administration/product/edit/{id}', 'Backend\ProductsController@edit');
    Route::delete('/administration/products', 'Backend\ProductsController@delete');
    Route::get('/administration/product/img/download/{id}', 'Backend\ProductsController@downloadImg');
    Route::post('/administration/product/img/sort', 'Backend\ProductsController@sortImg');
    Route::post('/administration/product/img/delete', 'Backend\ProductsController@deleteImg');
    Route::post('/administration/products/filtering', 'Backend\ProductsController@filtering');

    Route::group(['middleware' => 'adminPermision:Admin,Moderator'], function() {

    // CRUD заказов
        Route::get('/administration/orders', 'Backend\OrdersController@index');
        Route::post('/administration/orders/filtering', 'Backend\OrdersController@filtering');
        Route::get('/administration/orders/view/{id}', 'Backend\OrdersController@view');
        Route::get('/administration/orders/get/{id}', 'Backend\OrdersController@getShoppingCart');
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

    // CRUD Офисы/Филиалы
        Route::get('/administration/offices/index/{id?}', 'Backend\OfficesController@getAll');
        Route::get('/administration/offices/get/{id}', 'Backend\OfficesController@getOffice');
        Route::get('/administration/offices/add', 'Backend\OfficesController@addFormOffice');
        Route::post('/administration/offices/add', 'Backend\OfficesController@addOffice');
        Route::get('/administration/offices/edit/{id}', 'Backend\OfficesController@editFormOffice');
        Route::post('/administration/offices/edit/{id}', 'Backend\OfficesController@editOffice');
        Route::delete('/administration/offices','Backend\OfficesController@deleteOffice');
    });

    Route::group(['middleware' => 'adminPermision:Admin,SEO'], function() {

    // CRUD Блог
        Route::get('/administration/blog', 'Backend\BlogController@index');
        Route::get('/administration/blog/preview/{slug}', 'Backend\BlogController@preview');
        Route::post('/administration/blog/filtering', 'Backend\BlogController@filtering');
        Route::get('/administration/blog/add', 'Backend\BlogController@addForm');
        Route::post('/administration/blog/add', 'Backend\BlogController@add');
        Route::get('/administration/blog/edit/{id}', 'Backend\BlogController@editForm');
        Route::put('/administration/blog/edit/{id}', 'Backend\BlogController@edit');
        Route::delete('/administration/blog', 'Backend\BlogController@delete');
        Route::get('/administration/blog/delete-image/{id}', 'Backend\BlogController@deleteImg');

    //SMS
        Route::get('/administration/sms', 'Backend\ServiceController@sms');
        Route::post('/administration/sms/filtering', 'Backend\ServiceController@smsFiltering');

    //Прайслисты
        Route::get('/administration/price', 'Backend\PriceController@index');
        Route::post('/administration/price', 'Backend\PriceController@add');
        Route::get('/administration/price/load/{id}', 'Backend\PriceController@download');
        Route::get('/administration/price/delete/{id}', 'Backend\PriceController@delete');

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

    //Метатеги
        Route::get('/administration/metatags/{type?}/{slug?}', 'Backend\MetatagsContraller@index');
        Route::post('/administration/metatags', 'Backend\MetatagsContraller@add');
    });
});


// ФРОНТЕНД

Route::group(['middleware' => ['web', 'redirect-www', 'language-get']], function () {

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
        
    });


    Route::group(['middleware' => ['language']], function () {

        Route::get('/', ['as' => 'index-page', 'uses' => 'Frontend\IndexController@index']);
        Route::get('/contacts', ['as' => 'contacts', 'uses' => 'Frontend\ServiceController@contacts']);
        Route::get('/price', ['as' => 'prices', 'uses' => 'Frontend\ServiceController@prices']);
        Route::get('/yutmk-energy', ['as' => 'about-us', 'uses' => 'Frontend\IndexController@aboutUs']);
        Route::get('/company-profile', ['as' => 'profile', 'uses' => 'Frontend\IndexController@companyProfile']);
        Route::get('/network-of-offices', ['as' => 'network-of-offices', 'uses' => 'Frontend\IndexController@salesNetwork']);
        Route::get('/office/{city}/{id}', ['as' => 'office', 'uses' => 'Frontend\IndexController@officeView']);

    // СПРАВОЧНАЯ ИНФОРМАЦИЯ (статика)

        Route::get('/porezka', ['as' => 'porezka', 'uses' => 'Frontend\IndexController@porezka']);
        Route::get('/upakovka', ['as' => 'upakovka', 'uses' => 'Frontend\IndexController@upakovka']);
        Route::get('/dostavka', ['as' => 'dostavka', 'uses' => 'Frontend\IndexController@dostavka']);

        Route::get('/home/porezka', function(){
            return redirect('/porezka', 301);
        });
        Route::get('/home/upakovka', function(){
            return redirect('/upakovka', 301);
        });
        Route::get('/home/dostavka', function(){
            return redirect('/dostavka', 301);
        });

        Route::get('/eksport-import-metallicheskih-izdelij', ['as' => 'eksport-import', 'uses' => 'Frontend\IndexController@eksportImport']);
        Route::get('/shirokij-eksport-import-mira', ['as' => 'shirokij-eksport-import', 'uses' => 'Frontend\IndexController@shirokijEksportImport']);
        Route::get('/nashi-obemy-prodazh', ['as' => 'nashi-obemy-prodazh', 'uses' => 'Frontend\IndexController@nashiProdazh']);
        Route::get('/ustojchivoe-razvitie-kak-cel', ['as' => 'ustojchivoe-razvitie', 'uses' => 'Frontend\IndexController@ustojchivoeRazvitie']);
        Route::get('/my-stremimsya-dlya-nashix-klientov', ['as' => 'stremimsya-dlya-klientov', 'uses' => 'Frontend\IndexController@stremimsyaDlyaKlientov']);
        Route::get('/kontrol-kachestva-produkcii', ['as' => 'kontrol-kachestva', 'uses' => 'Frontend\IndexController@kontrolKachestva']);
        Route::get('/vashi-zakazy-kak-mozhno-skoree', ['as' => 'vashi-zakazy-kak-mozhno-skoree', 'uses' => 'Frontend\IndexController@vashiZakazy']);
        Route::get('/struktury-vozmozhen-zakaz-pod-klyuch', ['as' => 'struktury-pod-klyuch', 'uses' => 'Frontend\IndexController@strukturyPodKlyuch']);
        Route::get('/stremitelno-menyayushhemsya-mire', ['as' => 'stremitelno-menyayushhemsya-mire', 'uses' => 'Frontend\IndexController@stremitelnoMenyayushhemsyaMire']);
        Route::get('/chto-novogo', ['as' => 'chto-novogo', 'uses' => 'Frontend\IndexController@chtoNovogo']);
        Route::get('/luchshie-prodavcy', ['as' => 'luchshie-prodavcy', 'uses' => 'Frontend\IndexController@luchshieProdavcy']);
        Route::get('/razvitie', ['as' => 'razvitie', 'uses' => 'Frontend\IndexController@razvitie']);
        Route::get('/nasha-politika', ['as' => 'nasha-politika', 'uses' => 'Frontend\IndexController@nashaPolitika']);
        Route::get('/nadezhnyj-partner-dlya-vashego-biznesa', ['as' => 'nadezhnyj-partner', 'uses' => 'Frontend\IndexController@nadezhnyjPartner']);
        Route::get('/karernye-vozmozhnosti', ['as' => 'karernye-vozmozhnosti', 'uses' => 'Frontend\IndexController@karernyeVozmozhnosti']);

        Route::get('/blog', ['as' => 'blog', 'uses' => 'Frontend\BlogController@index']);
        Route::get('/blog/{slug}', 'Frontend\BlogController@view');
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

                Route::get('/', ['as' => 'index-page', 'uses' => 'Frontend\IndexController@index']);
                Route::get('/contacts', ['as' => 'contacts', 'uses' => 'Frontend\ServiceController@contacts']);
                Route::get('/price', ['as' => 'prices', 'uses' => 'Frontend\ServiceController@prices']);
                Route::get('/yutmk-energy', ['as' => 'about-us', 'uses' => 'Frontend\IndexController@aboutUs']);
                Route::get('/company-profile', ['as' => 'profile', 'uses' => 'Frontend\IndexController@companyProfile']);
                Route::get('/network-of-offices', ['as' => 'network-of-offices', 'uses' => 'Frontend\IndexController@salesNetwork']);
                Route::get('/office/{city}/{id}', ['as' => 'office', 'uses' => 'Frontend\IndexController@officeView']);

            // СПРАВОЧНАЯ ИНФОРМАЦИЯ (статика)

                Route::get('/porezka', ['as' => 'porezka', 'uses' => 'Frontend\IndexController@porezka']);
                Route::get('/upakovka', ['as' => 'upakovka', 'uses' => 'Frontend\IndexController@upakovka']);
                Route::get('/dostavka', ['as' => 'dostavka', 'uses' => 'Frontend\IndexController@dostavka']);

                Route::get('/home/porezka', function(){
                    return redirect('/porezka', 301);
                });
                Route::get('/home/upakovka', function(){
                    return redirect('/upakovka', 301);
                });
                Route::get('/home/dostavka', function(){
                    return redirect('/dostavka', 301);
                });

                Route::get('/eksport-import-metallicheskih-izdelij', ['as' => 'eksport-import', 'uses' => 'Frontend\IndexController@eksportImport']);
                Route::get('/shirokij-eksport-import-mira', ['as' => 'shirokij-eksport-import', 'uses' => 'Frontend\IndexController@shirokijEksportImport']);
                Route::get('/nashi-obemy-prodazh', ['as' => 'nashi-obemy-prodazh', 'uses' => 'Frontend\IndexController@nashiProdazh']);
                Route::get('/ustojchivoe-razvitie-kak-cel', ['as' => 'ustojchivoe-razvitie', 'uses' => 'Frontend\IndexController@ustojchivoeRazvitie']);
                Route::get('/my-stremimsya-dlya-nashix-klientov', ['as' => 'stremimsya-dlya-klientov', 'uses' => 'Frontend\IndexController@stremimsyaDlyaKlientov']);
                Route::get('/kontrol-kachestva-produkcii', ['as' => 'kontrol-kachestva', 'uses' => 'Frontend\IndexController@kontrolKachestva']);
                Route::get('/vashi-zakazy-kak-mozhno-skoree', ['as' => 'vashi-zakazy-kak-mozhno-skoree', 'uses' => 'Frontend\IndexController@vashiZakazy']);
                Route::get('/struktury-vozmozhen-zakaz-pod-klyuch', ['as' => 'struktury-pod-klyuch', 'uses' => 'Frontend\IndexController@strukturyPodKlyuch']);
                Route::get('/stremitelno-menyayushhemsya-mire', ['as' => 'stremitelno-menyayushhemsya-mire', 'uses' => 'Frontend\IndexController@stremitelnoMenyayushhemsyaMire']);
                Route::get('/chto-novogo', ['as' => 'chto-novogo', 'uses' => 'Frontend\IndexController@chtoNovogo']);
                Route::get('/luchshie-prodavcy', ['as' => 'luchshie-prodavcy', 'uses' => 'Frontend\IndexController@luchshieProdavcy']);
                Route::get('/razvitie', ['as' => 'razvitie', 'uses' => 'Frontend\IndexController@razvitie']);
                Route::get('/nasha-politika', ['as' => 'nasha-politika', 'uses' => 'Frontend\IndexController@nashaPolitika']);
                Route::get('/nadezhnyj-partner-dlya-vashego-biznesa', ['as' => 'nadezhnyj-partner', 'uses' => 'Frontend\IndexController@nadezhnyjPartner']);
                Route::get('/karernye-vozmozhnosti', ['as' => 'karernye-vozmozhnosti', 'uses' => 'Frontend\IndexController@karernyeVozmozhnosti']);

                Route::get('/blog', ['as' => 'blog', 'uses' => 'Frontend\BlogController@index']);
                Route::get('/blog/{slug}', 'Frontend\BlogController@view');
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

    // Route::get('/metallokonstruktsii', ['as' => 'metallokonstruktsii', 'uses' => 'Frontend\IndexController@metallokonstruktsii']);
    // Route::get('/modulnye-soorujeniya', ['as' => 'modulnye-soorujeniya', 'uses' => 'Frontend\IndexController@modulnyeSoorujeniya']);
    // Route::get('/otsinkovannye-rulony', ['as' => 'otsinkovannye-rulony', 'uses' => 'Frontend\IndexController@otsinkovannyeRulony']);
    // Route::get('/metall-iz-evropy', ['as' => 'metall-iz-evropy', 'uses' => 'Frontend\IndexController@metallIzEvropy']);
    // Route::get('/armatura', ['as' => 'armatura', 'uses' => 'Frontend\IndexController@armatura']);
    // Route::get('/balka-dvutavr', ['as' => 'balka-dvutavr', 'uses' => 'Frontend\IndexController@balkaDvutavr']);
    // Route::get('/katanka', ['as' => 'katanka', 'uses' => 'Frontend\IndexController@katanka']);
    // Route::get('/kvadrat', ['as' => 'kvadrat', 'uses' => 'Frontend\IndexController@kvadrat']);
    // Route::get('/krug', ['as' => 'krug', 'uses' => 'Frontend\IndexController@krug']);
    // Route::get('/polosa', ['as' => 'polosa', 'uses' => 'Frontend\IndexController@polosa']);
    // Route::get('/rels', ['as' => 'rels', 'uses' => 'Frontend\IndexController@rels']);
    // Route::get('/ugolok', ['as' => 'ugolok', 'uses' => 'Frontend\IndexController@ugolok']);
    // Route::get('/shveller', ['as' => 'shveller', 'uses' => 'Frontend\IndexController@shveller']);
    // Route::get('/shestigrannik', ['as' => 'shestigrannik', 'uses' => 'Frontend\IndexController@shestigrannik']);
    // Route::get('/staltrub', ['as' => 'staltrub', 'uses' => 'Frontend\IndexController@staltrub']);
    // Route::get('/truby-kotelnye', ['as' => 'truby-kotelnye', 'uses' => 'Frontend\IndexController@trubyKotelnye']);
    // Route::get('/pokovka', ['as' => 'pokovka', 'uses' => 'Frontend\IndexController@pokovka']);
    // Route::get('/list-hardox', ['as' => 'list-hardox', 'uses' => 'Frontend\IndexController@listHardox']);
    // Route::get('/list-stalnoj', ['as' => 'list-stalnoj', 'uses' => 'Frontend\IndexController@listStalnoj']);
    // Route::get('/shveller-gnutyj', ['as' => 'shveller-gnutyj', 'uses' => 'Frontend\IndexController@shvellerGnutyj']);
    // Route::get('/ugolok-gnutyj', ['as' => 'ugolok-gnutyj', 'uses' => 'Frontend\IndexController@ugolokGnutyj']);
    // Route::get('/z-obraznyj-profil', ['as' => 'z-obraznyj-profil', 'uses' => 'Frontend\IndexController@obraznyjProfil']);
});