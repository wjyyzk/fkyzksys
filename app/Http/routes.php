<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//	【サイト】
Route::get('storage', 'Site\StorageController@index');
Route::get('storage/{id}', 'Site\StorageController@show');
Route::get('stock/in', 'Site\StockInController@getIndex');
Route::post('stock/in', 'Site\StockInController@postIndex');
Route::get('stock/out', 'Site\StockOutController@getIndex');
Route::post('stock/out', 'Site\StockOutController@postIndex');
Route::get('login', 'Site\LoginController@getIndex');
Route::post('login', 'Site\LoginController@postIndex');
Route::get('logout', 'Site\LogoutController@getIndex');
Route::get('/', function () { return Redirect('/storage'); });

//	【管理】
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('storage/index', 'Admin\StorageController@index');
	Route::resource('storage', 'Admin\StorageController', ['except' => ['index', 'show']]);
	Route::get('stock/index', 'Admin\StockController@index');
	Route::post('stock/index', 'Admin\StockController@update');
	Route::get('print/index', 'Admin\PrintController@index');
	Route::get('print/{id}', 'Admin\PrintController@runPrint');
	Route::get('user/index', 'Admin\UserController@index');
	Route::resource('user', 'Admin\UserController', ['except' => ['index', 'show']]);
});

//	【API】
Route::get('/api/import', 'API\ImportController@index');