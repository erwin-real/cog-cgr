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
});

Route::get('/dashboard', 'DashboardController@index');

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// Reset Password
Route::get('/resetPassword/{id}','DashboardController@showResetPasswordForm');
Route::post('/resetPassword','DashboardController@resetPassword')->name('resetPassword');


// Guides
Route::get('/guide/users', 'UsersController@guideUsers');


// Users
Route::get('/users/create', 'UsersController@addUser');
Route::get('/users/{id}', 'UsersController@showUser');
Route::post('/users','UsersController@saveUser');
Route::get('/users','UsersController@users');
Route::get('/users/{id}/edit','UsersController@editUser');
Route::delete('/users/{id}','UsersController@destroyUser');
Route::put('/users/{id}','UsersController@updateUser');