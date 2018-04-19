<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::group(['prefix' => 'student'], function () {

    Route::get('login', [
        'uses' => 'StudentController@getLogin',
        'as' => 'get-login'
    ]);

    Route::post('login', [
        'uses' => 'StudentController@postLogin',
        'as' => 'login'
    ]);

    Route::post('register', [
        'uses' => 'StudentController@postRegister',
        'as' => 'register'
    ]);

});


Route::group(['prefix' => 'staff'], function () {

    Route::get('login', [
        'uses' => 'Auth\LoginController@showLoginForm',
        'as' => 'get-login'
    ]);

    Route::post('login', [
        'uses' => 'Auth\LoginController@login',
        'as' => 'login'
    ]);

    Route::get('register', [
        'uses' => 'userController@getRegister',
        'as' => 'get-register'
    ]);

    Route::post('register', [
        'uses' => 'userController@postRegister',
        'as' => 'register'
    ]);

});



