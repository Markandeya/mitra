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

Route::get('/check-relationship-status/{id}','FriendController@check')->name('check');

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');
Route::get('/profile/{id}', 'UserController@profile')->name('profile');
Route::post('/update-profile', 'UserController@postProfile')->name('update-profile');
Route::get('/amritians', 'UserController@amritians')->name('amritians');

Route::prefix('/admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/activate/{id}', 'AdminController@activate')->name('admin.activate');
  Route::get('/reject/{id}', 'AdminController@reject')->name('admin.reject');

});

//Routes for facebook and google API
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

//Route for sending join-request to admin
Route::post('/authrequest', 'AuthenticateController@createRequest')->name('authrequest');

require base_path('routes/ajax.php');

Route::get('test', 'UserController@search');
