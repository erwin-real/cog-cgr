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


Route::get('/', 'WelcomeController@welcome');

// DASHBOARD
Route::get('/dashboard', 'DashboardController@index');

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// MY CARE GROUP
Route::get('/my-care-group', 'MyCareGroupController@index');
Route::get('/my-care-group/{group}/edit', 'MyCareGroupController@edit');

// MY PROFILE
Route::get('/my-profile', 'MyProfileController@index');

// CHANGE PASSWORD
Route::get('/accounts/change-password','AccountController@showChangePasswordForm');
Route::post('/accounts/change-password','AccountController@changePassword');


// RESOURCES
Route::resource('users', 'UserController');
Route::resource('accounts', 'AccountController');
Route::resource('caregroups', 'GroupController');


// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');