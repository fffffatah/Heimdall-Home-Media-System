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
Route::get('login', ['as'=>'login.index', 'uses'=>'LoginController@index']);
Route::post('login', ['as'=>'login.authenticate', 'uses'=>'LoginController@authenticate']);
Route::get('registration', ['as'=>'registration.index', 'uses'=>'RegistrationController@index']);
Route::post('registration', ['as'=>'registration.registration', 'uses'=>'RegistrationController@registration']);