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
Route::get('storage/index', 'Site\StorageController@index');
Route::get('storage/{id}', 'Site\StorageController@show');
Route::resource('storage/in', 'Site\StorageInController', ['except' => ['index', 'show']]);
Route::resource('storage/out', 'Site\StorageOutController', ['except' => ['index', 'show']]);
Route::get('history', 'Site\HistoryController@index');
Route::resource('ht/upload', 'Site\HTUploadController', ['only' => ['index', 'store']]);
Route::get('login', 'Site\LoginController@getIndex');
Route::post('login', 'Site\LoginController@postIndex');
Route::get('logout', 'Site\LogoutController@getIndex');
Route::get('/', function () { return Redirect('/storage/index'); });

//	【管理】
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('storage/index', 'Admin\StorageController@index');
	Route::resource('storage', 'Admin\StorageController', ['except' => ['index']]);
	Route::resource('storage.history', 'Admin\HistorySeppenController', ['except' => ['show']]);
	Route::get('print/index', 'Admin\PrintController@index');
	Route::get('print/{id}', 'Admin\PrintController@runPrint');
	Route::get('merchant/index', 'Admin\MerchantController@index');
	Route::resource('merchant', 'Admin\MerchantController', ['except' => ['index', 'show']]);
	Route::get('pic/index', 'Admin\PICController@index');
	Route::resource('pic', 'Admin\PICController', ['except' => ['index', 'show']]);
	Route::get('user/index', 'Admin\UserController@index');
	Route::resource('user', 'Admin\UserController', ['except' => ['index', 'show']]);
});

//	【API】
//Route::get('api/import', 'API\ImportController@index');
Route::get('api/storage', 'API\StorageController@ts');
Route::get('api/storage/{id}', 'API\StorageController@index');
//Route::get('api/storage/in/{key}/{id}/{stock}', 'API\StorageInController@index');
//Route::get('api/storage/out/{key}/{id}/{stock}', 'API\StorageOutController@index');
