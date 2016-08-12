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

    Route::get('/', function(){
        // return view('frontend.site.index');
        return redirect('/administration');
    });

    // // Authentication Routes...
    // Route::get('/login/{locale?}', 'Auth\AuthController@showLoginForm');
    // Route::post('/login', 'Auth\AuthController@login');
    // Route::get('/logout', 'Auth\AuthController@logout');

    // // Registration Routes...
    // Route::get('/register/{locale?}', 'Auth\AuthController@showRegistrationForm');
    // Route::post('/register', 'Auth\AuthController@register');

    // // Password Reset Routes...
    // Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    // Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
    // Route::post('/password/reset', 'Auth\PasswordController@reset');

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

    // Зона админа
    Route::group(['middleware' => 'isAdmin'], function() {
        // CRUD Менеджеры/Модераторы админки
        Route::get('/administration/moderators', 'Backend\EmployeeController@moderators');
        Route::post('/administration/moderator','Adminauth\AuthController@createModerator');
        Route::put('/administration/moderator','Adminauth\AuthController@editModerator');
        Route::delete('/administration/moderator','Adminauth\AuthController@deleteModerator');

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
        Route::get('/administration/offices/{language?}', 'Backend\OfficesController@getAll');
        Route::get('/administration/offices/add/{language?}', 'Backend\OfficesController@addOffice');

        // Route::post('/administration/offices','Adminauth\AuthController@createModerator');
        // Route::put('/administration/offices','Adminauth\AuthController@editModerator');
        // Route::delete('/administration/offices','Adminauth\AuthController@deleteModerator');
    });
});