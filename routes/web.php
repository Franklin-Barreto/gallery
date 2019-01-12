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

Route::get('/','ImageGalleryController@index');
Route::post('upload','ImageGalleryController@upload');
Route::get('show','ImageGalleryController@showFiles');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
