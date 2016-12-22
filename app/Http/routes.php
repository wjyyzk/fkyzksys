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
Route::resource('stock/in', 'Site\StockInController', ['only' => ['create', 'store']]);
Route::resource('stock/out', 'Site\StockOutController', ['only' => ['create', 'store']]);
Route::resource('history', 'Site\HistoryController', ['except' => ['create']]);
Route::resource('ht/upload', 'Site\HTUploadController', ['only' => ['index', 'store']]);
Route::get('login', 'Site\LoginController@getIndex');
Route::post('login', 'Site\LoginController@postIndex');
Route::get('logout', 'Site\LogoutController@getIndex');
Route::get('/', function () { return Redirect('/storage'); });

//	【管理】
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('storage/index', 'Admin\StorageController@index');
	Route::resource('storage', 'Admin\StorageController', ['except' => ['index', 'show']]);
	Route::get('print/index', 'Admin\PrintController@index');
	Route::get('print/{id}', 'Admin\PrintController@runPrint');
	Route::get('user/index', 'Admin\UserController@index');
	Route::resource('user', 'Admin\UserController', ['except' => ['index', 'show']]);
});

//	【API】
//Route::get('api/import', 'API\ImportController@index');
Route::get('api/stock/{key}/{id}', 'API\StockController@index');
Route::get('api/stock/in/{key}/{id}/{stock}', 'API\StockInController@index');
Route::get('api/stock/out/{key}/{id}/{stock}', 'API\StockOutController@index');
