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
    return view('index');
})->name('home');


Route::group(['prefix' => 'student'], function () {

    Route::get('login', [
        'uses' => 'StudentController@getLogin',
        'as' => 'get-student-login'
    ]);

    Route::post('login', [
        'uses' => 'StudentController@postLogin',
        'as' => 'student-login'
    ]);

    Route::get('register', [
        'uses' => 'StudentController@Register',
        'as' => 'student-register'
    ]);

});


Route::group(['prefix' => 'lecturer'], function () {

    Route::get('login', [
        'uses' => 'Auth\LoginController@showLoginForm',
        'as' => 'get-staff-login'
    ]);

    Route::post('login', [
        'uses' => 'Auth\LoginController@login',
        'as' => 'staff-login'
    ]);

    Route::get('register', [
        'uses' => 'userController@getRegister',
        'as' => 'get-staff-register'
    ]);

    Route::post('register', [
        'uses' => 'userController@postRegister',
        'as' => 'staff-register'
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
        'uses' => 'CourseController@read',
        'as' => 'course-show'
    ]);

    Route::get('dashboard/courses/{id}/delete', [
        'uses' => 'CourseController@delete',
        'as' => 'course-delete'
    ]);

    Route::get('dashboard/courses/{courseId}/attendance/new', [
        'uses' => 'AttendanceController@getCreate',
        'as' => 'create-new-att'
    ]);

    Route::post('dashboard/courses/{courseId}/attendance/new', [
        'uses' => 'AttendanceController@postCreate',
        'as' => 'save-new-att'
    ]);

    Route::get('dashboard/courses/{courseId}/attendance/{attId}', [
        'uses' => 'AttendanceController@read',
        'as' => 'att-show'
    ]);
    

});



