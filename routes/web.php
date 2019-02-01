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

Route::get('/', 'ContatoController@index')->name('listContato');
Route::post('/contato', 'ContatoController@store');
Route::get('/contato/novo', 'ContatoController@create')->name('cadContato');
Route::get('contato/{contato}', 'ContatoController@show');
Route::put('contato/{contato}', 'ContatoController@update');
Route::delete('contato/{contato}', 'ContatoController@destroy');
Route::get('contato/{contato}/edit', 'ContatoController@edit');

// Route::resource('contato', 'ContatoController');
// Route::post('/novo-contato', 'ContatoController@store')->name('storeContato');

// Route::resource('contato', 'ContatoController');