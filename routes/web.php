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

Route::get('/','uploadController@index')->name('home');

Auth::routes();

Route::resource('upload', 'uploadController',['only'=>['store','destroy']]);
Route::resource('user', 'UserController',['only'=>['update','destroy','index','show']]);
