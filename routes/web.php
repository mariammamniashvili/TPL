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

Route::get('testing','AuthentificationController@index');
Route::get('platform','UserController@platform');
Route::get('/', 'TestController@gela');
Route::get('test', 'UserController@CarCategory');
Route::post('login', 'AuthentificationController@system_login');
Route::post('register', 'AuthentificationController@user_registration');
Route::post('system_register', 'AuthentificationController@system_registration');
Route::get('categories', 'UserController@CarCategory');
Route::get('models', 'UserController@CarModels');
Route::get('refund', 'UserController@Refund');
Route::get('price', 'UserController@Price');
Route::get('delete/{user_id}', 'AuthentificationController@update_delete_status');
Route::get('status/{user_id}/{status}', 'AuthentificationController@update_status');
