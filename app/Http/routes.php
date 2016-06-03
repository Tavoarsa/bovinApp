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





Route::get('/',[

	'as'=>'home',
	'uses'=>'FrontController@index'
	]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'FrontController@search'
	]);

Route::get('farm_info/{id}',[
	'as'=>'info-farm',
	'uses'=>'FrontController@info_farm'
	]);

Route::resource('user','UserController');
Route::get('cotacto', 'FrontController@cotacto');






//Inyeccion de dependencia
//Vincula
//FUNCIÓN ANONIMA:Busca el producto mediante el slug la URl queda vinculada a los metodos.
Route::bind('product',function($slug){

	return BovinApp\Product::where('slug',$slug)->first();
});

// Category dependency injection, function anonima
Route::bind('category', function($category){
    return BovinApp\Category::find($category);
});




												/*Rutas Store*/

/*---------------------------------------------------------------------------
*/
Route::get('store',[
	'as'=>'store',
	'uses'=>'StoreController@index'
	]);

Route::get('product/{slug}',[
	'as'=>'product-detail',
	'uses'=>'StoreController@show'
	]);

Route::get('cart/show',[
	'as'=>'cart-show',
	'uses'=>'CartController@show'
	]);

Route::get('cart/add/{product}',[
	'as'=>'cart-add',
	'uses'=>'CartController@add'
	]);

Route::get('cart/delete/{product}',[
	'as'=>'cart-delete',
	'uses'=>'CartController@delete'
	]);

Route::get('cart/trash',[
	'as'=>'cart-trash',
	'uses'=>'CartController@trash'
	]);

Route::get('cart/update/{product}/{quantity}',[
	'as'=>'cart-update',
	'uses'=>'CartController@update'
	]);

//Validamos  si el usuario inicio sesion
//Petición detalle del pedido.
Route::get('order-detail', [
	'middleware'=>'auth',
	'as' => 'order-detail',
	'uses' => 'CartController@orderDetail'
]);


/*Auntenticación
-----------------------------------------------------------------------------------
*/


// Authentication routes...
Route::get('auth/login', [
	'as' => 'login-get',
	'uses' => 'Auth\AuthController@getLogin'
]);
Route::post('auth/login', [
	'as' => 'login-post',
	'uses' => 'Auth\AuthController@postLogin'
]);
Route::get('auth/logout', [
	'as' => 'logout',
	'uses' => 'Auth\AuthController@getLogout'
]);
// Registration routes...
Route::get('auth/register', [
	'as' => 'register-get',
	'uses' => 'Auth\AuthController@getRegister'
]);
Route::post('auth/register', [
	'as' => 'register-post',
	'uses' => 'Auth\AuthController@postRegister'
]);

// Paypal
// Enviamos nuestro pedido a PayPal
Route::get('payment', array(
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));
// Después de realizar el pago Paypal redirecciona a esta ruta
Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));

//Admin
//-----------------------------------------------------------------------------------------
Route::get('admin',['middleware' => 'auth',function(){
	return view('admin.home');
}]);


Route::group(['middleware' => ['auth']], function () {
   
  	Route::resource('admin/category','Admin\CategoryController');
	Route::resource('admin/product','Admin\ProductController');	
	Route::resource('admin/user','Admin\UserController');
	

	Route::get('dashboard/{slug}',[
	  'as'=>'dashboard-farm',
	  'uses'=>'DashboardController@get_farm'
	]);

//Farm
	/*-------------------------------------------*/

	Route::resource('farm','FarmController');

	Route::get('farm/info',[
	  'as'=>'farm-info',
	  'uses'=>'FarmController@show'
	]);
	
	Route::get('farm',[
	  'as'=>'farm-index',
	  'uses'=>'FarmController@index'
	]);

	Route::get('farm/create',[
	  'as'=>'farm-create',
	  'uses'=>'FarmController@create'
	]);

//Animal
	/*-------------------------------------------*/

	Route::resource('animal','AnimalController');

	Route::get('animal','AnimalController@index');

	Route::get('animal/{slug}',[
		'as'=>'dashboard-animal',
		'uses'=>'AnimalController@show'
		]);

	Route::get('animal',[
	  'as'=>'animal-index',
	  'uses'=>'AnimalController@index'
	]);

	Route::get('animal/create',[
	  'as'=>'animal-create',
	  'uses'=>'AnimalController@create'
	]);

	

});

	



Route::get('orders',[

	  'as'=>'admin.order.index',
	  'uses'=>'Admin\OrderController@index'
	]);
Route::post('order/get-items', [
	    'as' => 'admin.order.getItems',
	    'uses' => 'Admin\OrderController@getItems'
	]);
	Route::get('order/{id}', [
	    'as' => 'admin.order.destroy',
	    'uses' => 'Admin\OrderController@destroy'
	]);



    
});
