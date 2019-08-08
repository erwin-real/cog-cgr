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


use Illuminate\Support\Facades\Route;

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
Route::put('/my-care-group/{group}/edit', 'MyCareGroupController@update');

// MEMBERS
Route::get('/my-care-group/members/{user}', 'MemberController@show');
Route::get('/my-care-group/members/{user}/edit', 'MemberController@edit');
Route::put('/my-care-group/members/{user}', 'MemberController@update');

// MY PROFILE
Route::get('/my-profile', 'MyProfileController@index');
Route::get('/my-profile/users/{user}', 'MyProfileController@show');
Route::get('/my-profile/edit', 'MyProfileController@edit');
Route::put('/my-profile', 'MyProfileController@update');

// CHANGE PASSWORD
Route::get('/my-profile/change-password','MyProfileController@showChangePasswordForm');
Route::post('/my-profile/change-password','MyProfileController@changePassword');

// RESOURCES
Route::resource('users', 'UserController');
//Route::resource('accounts', 'AccountController');
Route::resource('caregroups', 'GroupController');


// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');