<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::group(['middleware' => ['web']], function () {

    if (!env('INSTALLED', false)) {
        Route::get('/', 'Install\InstallController@index');
        Route::post('install/store', 'Install\InstallController@store');
    } else {
    	Auth::routes();
        Route::get('/', 'HomeController@index');
		Route::get('/home', 'HomeController@index');
		Route::get('/user_login/{id}', 'HomeController@user_login');
		Route::get('settings', 'HomeController@settings');

		Route::resource('users', 'UsersController');
		Route::resource('check', 'CheckController');
		Route::resource('statistics', 'StatisticsController');
    }
});







