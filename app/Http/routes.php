<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','FrontController@index');
Route::get('admin', 'FrontController@admin');

Route::resource('user','UserController');
Route::get('cotacto', 'FrontController@cotacto');

Route::get('store',[
	'as'=>'store',
	'uses'=>'StoreController@index'
	]);

Route::get('product/{slug}',[
	'as'=>'product-detail',
	'uses'=>'StoreController@show'
	]);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
});
