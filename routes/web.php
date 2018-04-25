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

    Route::get('dashboard', [
        'uses' => 'userController@dashboard',
        'as' => 'dashboard'
    ]);

    Route::get('dashboard/courses/all', [
        'uses' => 'userController@dashboard',
        'as' => 'dashboard'
    ]);

    Route::get('dashboard/courses/new', [
        'uses' => 'CourseController@getCreate',
        'as' => 'create-new-course'
    ]);

    Route::post('dashboard/courses/new', [
        'uses' => 'CourseController@postCreate',
        'as' => 'save-new-course'
    ]);

    Route::get('dashboard/courses/{id}', [
        'uses' => 'CourseController@show',
        'as' => 'course-show'
    ]);

    Route::get('dashboard/courses/{id}/delete', [
        'uses' => 'CourseController@delete',
        'as' => 'course-delete'
    ]);

});



