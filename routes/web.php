<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create.blade.php something great!
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
    Route::post('/rooms/upload', 'RoomController@uploadImage')->name('upload');
    Route::post('/rooms/delete', 'RoomController@destroyImage');
});

Route::get('/home', 'PageController@home')->name('home');
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
    Route::get('/', 'PageController@home');
    Route::resource('roles', 'RoleController', ['as' => 'admin']);
    Route::resource('users', 'UserController', ['as' => 'admin']);
});
