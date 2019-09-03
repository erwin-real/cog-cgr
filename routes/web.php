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
Route::get('/home', function () { return redirect('/dashboard'); });

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// CLUSTER CARE GROUPS
Route::get('/cluster', 'ClusterController@index');
Route::get('/cluster/{group}', 'ClusterController@show');

// GUIDE
Route::get('/guides/my-profile', 'GuideController@myProfile');
Route::get('/guides/my-reports', 'GuideController@myReports');
Route::get('/guides/my-care-group', 'GuideController@myCareGroup');
Route::get('/guides/cluster-care-group', 'GuideController@clusterCareGroup');
Route::get('/guides/department-care-group', 'GuideController@departmentCareGroup');
Route::get('/guides/caregroups', 'GuideController@caregroups');
Route::get('/guides/reports', 'GuideController@reports');
Route::get('/guides/users', 'GuideController@users');

// DEPARTMENT CARE GROUPS
//Route::get('/department', 'DepartmentGroupController@index');
//Route::get('/department/{group}', 'DepartmentGroupController@show');

Route::post('/reports/update-status/{id}','ReportController@updateStatus');
Route::post('/reports/check/{id}','ReportController@check');

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

// MY PROFILE CHANGE PASSWORD
Route::get('/my-profile/change-password','MyProfileController@showChangePasswordForm');
Route::post('/my-profile/change-password','MyProfileController@changePassword');

// USERS CHANGE PASSWORD
Route::get('/users/change-password','UserController@showChangePasswordForm');
Route::post('/users/change-password','UserController@changePassword');

// RESOURCES
Route::resource('users', 'UserController');
Route::resource('caregroups', 'GroupController');
Route::resource('department', 'DepartmentController');
Route::resource('reports', 'ReportController', ['only' => ['index', 'show']]);
Route::resource('my-reports', 'MyReportController');
//Route::resource('accounts', 'AccountController');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');