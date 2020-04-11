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

use App\Http\Controllers\PropertyController;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','PropertyController@index');

Route::get('/hubchain','PropertyController@index');

Route::get('/hubchain/novo', 'PropertyController@create');
Route::post('/hubchain/store', 'PropertyController@store');

Route::get('/hubchain/{item}', 'PropertyController@show');

Route::get('/hubchain/editar/{item}', 'PropertyController@edit');
Route::put('/hubchain/update/{item}', 'PropertyController@update');

Route::get('/hubchain/remover/{item}', 'PropertyController@destroy');


