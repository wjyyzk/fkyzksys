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
Route::controller('storage', 'Site\StorageController');
Route::get('login', 'Site\LoginController@getIndex');
Route::post('login', 'Site\LoginController@postIndex');
Route::get('logout', 'Site\LogoutController@getIndex');
Route::get('/', function () { return Redirect('/storage'); });

//	【管理】
Route::group(['prefix' => 'admin'], function() {
	Route::resource('storage', 'Admin\StorageController', ['except' => ['show']]);
	Route::resource('user', 'Admin\UserController', ['except' => ['show']]);
});

//	【API】