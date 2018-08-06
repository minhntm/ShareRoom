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

Route::get('/rooms/{id}', 'RoomController@show')->where('id', '[0-9]+')->name('rooms.show');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/rooms', 'RoomController@index')->name('rooms.index');
    Route::get('/rooms/create', 'RoomController@create')->name('rooms.create');
    Route::post('/rooms', 'RoomController@store')->name('rooms.store');
    Route::get('/rooms/{id}/edit', 'RoomController@edit')->name('rooms.edit');
    Route::put('/rooms/{id}', 'RoomController@update')->name('rooms.update');
    Route::delete('/rooms/{id}', 'RoomController@destroy')->name('rooms.destroy');
});
