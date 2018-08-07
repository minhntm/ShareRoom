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

Auth::routes();

Route::get('/', 'PageController@home')->name('home');
Route::get('/home', 'PageController@home')->name('home');
Route::get('/upload', 'ImagesController@create');
Route::post('/upload', 'ImagesController@store')->name('upload');
Route::post('/delete', 'ImagesController@destroy');
Route::get('/images-show', 'ImagesController@index');
