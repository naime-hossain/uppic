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

Route::post('upload/store', 'uploadController@store');
Route::delete('upload/{id}/destroy', 'uploadController@destroy');
Route::put('upload/{id}/update', 'uploadController@update');
// Route::resource('user', 'UserController',['only'=>['update','destroy','index','show']]);
Route::get('user/images', 'UserController@index')->name('user.images');
Route::get('user/{id}', 'UserController@show')->name('user.show');
Route::get('user/{name}/images', 'UserController@userImage')->name('user.uploads');
Route::put('user/{id}/edit', 'UserController@update')->name('user.update');
Route::delete('user/{id}/destroy', 'UserController@destroy')->name('user.destroy');
// Route::get('user/upload', 'UserController@index')->name('user.upload');

//Image favourite controller
Route::post('favourite/{photo_id}','FavouriteController@store')->name('favourite');



