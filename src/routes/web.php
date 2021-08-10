<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login.index');
});
//LOGIN AND REGISTRATION
Route::group(['middleware' => ['rememberme']], function () {
    Route::get('login', ['as'=>'login.index', 'uses'=>'LoginController@index']);
    Route::get('registration', ['as'=>'registration.index', 'uses'=>'RegistrationController@index']);
    Route::get('setpass', ['as'=>'setpass.index', 'uses'=>'RegistrationController@setPassIndex']);
});
Route::post('login', ['as'=>'login.authenticate', 'uses'=>'LoginController@authenticate']);
Route::post('registration', ['as'=>'registration.registration', 'uses'=>'RegistrationController@registration']);
Route::get('logout', ['as'=>'logout.index', 'uses'=>'LogoutController@index']);
Route::post('setpass', ['as'=>'setpass.set', 'uses'=>'RegistrationController@setNewPass']);


Route::group(['middleware' => ['authuser']], function () {
    Route::group(['middleware' => ['iskid']], function () {
        Route::get('dashboard', ['as'=>'dashboard.index', 'uses'=>'DashboardController@index']);
        //ACCOUNT UPDATE
        Route::get('myaccount', ['as'=>'myaccount.index', 'uses'=>'AccountController@index']);
        Route::post('myaccount', ['as'=>'myaccount.update', 'uses'=>'AccountController@updateUser']);
        Route::get('changepass', ['as'=>'changepass.index', 'uses'=>'AccountController@changePassIndex']);
        Route::post('changepass', ['as'=>'changepass.change', 'uses'=>'AccountController@changePass']);

        Route::group(['middleware' => ['isadmin']], function () {
            Route::get('users', ['as'=>'users.index', 'uses'=>'UserController@index']);
            Route::get('users/{id}', ['as'=>'users.delete', 'uses'=>'UserController@deleteUser']);
            Route::get('adduser', ['as'=>'adduser.index', 'uses'=>'UserController@addUserIndex']);
            Route::post('adduser', ['as'=>'adduser.addUser', 'uses'=>'UserController@addUser']);
        });
    });
});