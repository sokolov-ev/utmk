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

// ФРОНТЕНД

Route::group(['middleware' => ['web', 'language']], function () {

    Route::get('/', ['as' => 'index-page', 'uses' => 'Frontend\IndexController@index']);
    // Route::get('/', ['as' => 'index-page', 'uses' => 'Frontend\IndexController@testing']);

    Route::get('/network-of-offices', ['as' => 'network-of-offices', 'uses' => 'Frontend\IndexController@salesNetwork']);

    // Отображение продукции
    Route::get('/products', ['as' => 'products-index', 'uses' => 'Frontend\ProductsController@index']);
    // AJAX подгружаем меню
    Route::get('/products/menu', 'Frontend\ProductsController@getMenu');
    // AJAX подгружаем продукцию (menu, name, city, page)
    Route::get('/products/catalog', 'Frontend\ProductsController@catalogProducts');


    Route::get('/products/details/{slug}/{id}', ['as' => 'products-view', 'uses' => 'Frontend\ProductsController@view']);

    // // Authentication Routes...
    // Route::get('/login/{locale?}', 'Auth\AuthController@showLoginForm');
    Route::post('/login', 'Auth\AuthController@login');
    Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

    // // Registration Routes...
    Route::get('/register', 'Auth\AuthController@showRegistrationForm');
    Route::post('/register', 'Auth\AuthController@register');

    // // Password Reset Routes...
    Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Auth\PasswordController@reset');

    // Route::get('/room/{locale?}', 'HomeController@index');
});

// БЕКЕНД

Route::get('/administration/login','Adminauth\AuthController@showLoginForm');
Route::post('/administration/login','Adminauth\AuthController@postLogin');

// Регал админа.
// Route::get('/administration/register','Adminauth\AuthController@showRegistrationForm');
// Route::post('/administration/register','Adminauth\AuthController@postRegister');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/administration/logout','Adminauth\AuthController@logout');

    Route::get('/administration', 'Backend\EmployeeController@view');
    Route::get('/administration/clients', 'Backend\EmployeeController@clients');

// CRUD продукции и изображений продукции
    Route::get('/administration/products', 'Backend\ProductsController@getAll');
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

    Route::get('/administration/products/filtering', 'Backend\ProductsController@filtering');


// CRUD заказов



    // Зона админа
    Route::group(['middleware' => 'isAdmin'], function() {
    // CRUD Менеджеры/Модераторы админки
        Route::get('/administration/moderators/{id?}', 'Backend\EmployeeController@moderators');
        Route::post('/administration/moderator', 'Adminauth\AuthController@createModerator');
        Route::put('/administration/moderator', 'Adminauth\AuthController@editModerator');
        Route::delete('/administration/moderator', 'Adminauth\AuthController@deleteModerator');

    // CRUD меню продукции сайта
        // Страница с редактором меню
        Route::get('/administration/menu', function(){
            return view('backend.site.menu');
        });
        // Получаем меню через ajax
        Route::get('/administration/menu/{language}', 'Backend\MenuController@getMenu');
        // Получаем пункт меню для редактирования
        Route::get('/administration/menu-item/{id}', 'Backend\MenuController@getMenuItem');
        // Добавляем пункт меню
        Route::post('/administration/menu', 'Backend\MenuController@addMenu');
        // Редактируем пункт меню
        Route::put('/administration/menu', 'Backend\MenuController@editMenu');
        // Сохраняем струкетуру меню (порядок, вес, вложеность)
        Route::post('/administration/menu-sort', 'Backend\MenuController@sortMenu');
        // Удалить пункт меню
        Route::delete('/administration/menu', 'Backend\MenuController@deleteMenu');

    // CRUD филиалов
        Route::get('/administration/offices/index/{id?}', 'Backend\OfficesController@getAll');
        Route::get('/administration/offices/get/{id}', 'Backend\OfficesController@getOffice');

        // Route::get('/administration/offices/pre/view', 'Backend\OfficesController@view');

        Route::get('/administration/offices/add', 'Backend\OfficesController@addFormOffice');
        Route::post('/administration/offices/add', 'Backend\OfficesController@addOffice');

        Route::get('/administration/offices/edit/{id}', 'Backend\OfficesController@editFormOffice');
        Route::post('/administration/offices/edit/{id}', 'Backend\OfficesController@editOffice');

        Route::delete('/administration/offices','Backend\OfficesController@deleteOffice');
    });
});