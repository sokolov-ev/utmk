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

Route::get('/administration/login','Adminauth\AuthController@showLoginForm');
Route::post('/administration/login','Adminauth\AuthController@postLogin');

// Route::get('/administration/register','Adminauth\AuthController@showRegistrationForm');
// Route::post('/administration/register','Adminauth\AuthController@postRegister');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/administration/logout','Adminauth\AuthController@logout');

    Route::get('/administration', 'Admin\EmployeeController@view');
    Route::get('/administration/clients', 'Admin\EmployeeController@clients');

    // Зона админа
    Route::group(['middleware' => 'isAdmin'], function() {
        // CRUD Менеджеры/Модераторы админки
        Route::get('/administration/moderators', 'Admin\EmployeeController@moderators');
        Route::post('/administration/moderator','Adminauth\AuthController@createModerator');
        Route::put('/administration/moderator','Adminauth\AuthController@editModerator');
        Route::delete('/administration/moderator','Adminauth\AuthController@deleteModerator');

        // CRUD меню продукции сайта
        Route::get('/administration/menu', 'Admin\SiteController@editMenu');

        Route::get('/service/menu', 'Admin\ServiceController@getMenu');
        // Route::put('/service/menu', 'Admin\ServiceController@addMenu');
        Route::post('/service/menu', 'Admin\ServiceController@addMenu');
        Route::post('/service/menu-sort', 'Admin\ServiceController@sortMenu');

    });
});



// ФРОНТЕНД



Route::group(['middleware' => 'web'], function () {

    // Authentication Routes...
    Route::get('/login/{locale?}', 'Auth\AuthController@showLoginForm');
    Route::post('/login', 'Auth\AuthController@login');
    Route::get('/logout', 'Auth\AuthController@logout');

    // Registration Routes...
    Route::get('/register/{locale?}', 'Auth\AuthController@showRegistrationForm');
    Route::post('/register', 'Auth\AuthController@register');

    // Password Reset Routes...
    Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Auth\PasswordController@reset');

    Route::get('/room/{locale?}', 'HomeController@index');
});