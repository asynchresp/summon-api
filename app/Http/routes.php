<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
 */

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'api', 'prefix' => 'api', 'namespace' => 'Api'], function () {

    Route::post('login', 'AuthController@login');

    Route::post('register', 'RegisterController@register');

    Route::group(['middleware' => 'jwt.auth'], function () {

        Route::resource('user', 'UserController');

        Route::resource('summon', 'SummonController');

        Route::get('logout', 'AuthController@logout');
    });

});
