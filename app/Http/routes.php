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


	/*Route::get('mail/queue',function(){

		  Mail::later(5,'email.queued_email',["name"=>"TAVO"],function ($m) {           

            $m->to('tavo.cr23@gmail.com', 'TAVO')->subject('Good!');
        });

		  return "Email 5 seconds";



	});*/





Route::get('/',[

	'as'=>'home',
	'uses'=>'FrontController@index'
	]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'FrontController@search'
	]);

Route::get('badamecumm',[
	'as'=>'badamecum-index',
	'uses'=>'FrontController@show_bademecum'
	]);

Route::get('badamecumm/{slug}',[
	'as'=>'detail-badamecum',
	'uses'=>'FrontController@detail_badamecum'
	]);

Route::get('farm_info/{id}',[
	'as'=>'info-farm',
	'uses'=>'FrontController@info_farm'
	]);

Route::get('sale_animal',[
	'as'=>'sale-animal',
	'uses'=>'FrontController@sale_animal'
	]);
//Información del animal y del dueño
Route::get('sale_animal/{slug}',[
	'as'=>'info_sale',
	'uses'=>'FrontController@info_sale'
	]);



Route::resource('user','UserController');
Route::get('cotacto', 'FrontController@cotacto');






//Inyeccion de dependencia
//Vincula
//FUNCIÓN ANONIMA:Busca el producto mediante el slug la URl queda vinculada a los metodos.


Route::bind('product',function($slug){

	 BovinApp\Product::where('slug',$slug)->first();
});


Route::bind('badamecum',function($slug){

	 return BovinApp\Badamecum::where('slug',$slug)->first();
});

// Category dependency injection, function anonima
Route::bind('category', function($category){
    return BovinApp\Category::find($category);
});


//FUNCIÓN ANONIMA:Busca el producto mediante el slug la URl queda vinculada a los metodos.
/*Route::bind('veterinary',function($slug){

	return BovinApp\Badamecum::find('slug',$slug)->first();
});*/




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
	Route::resource('admin/badamecum','Admin\BadamecumController');
	
	

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

//Animal 1-5310883786
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
//Bademecum

	/*-------------------------------------------*/
	Route::resource('badamecum','Veterinary\BadamecumController');


	Route::get('badamecum',[
	  'as'=>'badamecum-farm',
	  'uses'=>'Veterinary\BadamecumController@index'
	]);

	Route::get('badamecum/{slug}',[
	'as'=>'badamecum-detail',
	'uses'=>'Veterinary\BadamecumController@show'
	]);

//Sale Animal.

	Route::resource('sale','SaleAnimalController');

	Route::get('sale/{slug}',[
	'as'=>'create-sale',
	'uses'=>'SaleAnimalController@show'
	]);

	Route::get('sale',[
	'as'=>'to-sale',
	'uses'=>'SaleAnimalController@show'
	]);

	Route::get('sale/info/{slug}',[
	'as'=>'info-sale',
	'uses'=>'SaleAnimalController@index'
	]);

//Reproduction

	Route::resource('reproduction','ReproductionController');

	Route::get('reproduction',[
	  'as'=>'reproduction-index',
	  'uses'=>'ReproductionController@index'
	]);

//price_weight
	Route::resource('price_weight','Price_WeightController');

	Route::get('price_weight',[
	  'as'=>'price_weight-index',
	  'uses'=>'Price_WeightController@index'
	]);

//Weight


	Route::resource('weight','WeightController');

	Route::get('weight',[
	  'as'=>'weight-index',
	  'uses'=>'WeightController@index'
	]);


//Production

	Route::resource('production','ProductionController');

	Route::get('production',[
	  'as'=>'production-index',
	  'uses'=>'ProductionController@index'
	]);
//price_milk

	Route::resource('price_milk','price_MilkController');

	Route::get('price_milk',[
	  'as'=>'price_milk-index',
	  'uses'=>'price_MilkController@index'
	]);

//Vaccines
	Route::resource('vaccine','VaccineController');

	Route::get('vaccine',[
	  'as'=>'vaccine-index',
	  'uses'=>'VaccineController@index'
	]);	

//Injections

	Route::resource('injecction','InjecctionController');

	Route::get('injecction',[
	  'as'=>'injecction-index',
	  'uses'=>'InjecctionController@index'
	]);
//Aliment

	Route::resource('aliment','AlimentController');

	Route::get('aliment',[
	  'as'=>'aliment-index',
	  'uses'=>'AlimentController@index'
	]);

//Report

	Route::get('report/reproduction',[
		'as'=>'report-reproduction',
		'uses'=>'ReportController@report_reproduction'

		]);

	Route::get('report/production',[
		'as'=>'report-production',
		'uses'=>'ReportController@report_production'

		]);
	Route::get('report/production_mastitis',[
		'as'=>'report-production_mastitis',
		'uses'=>'ReportController@mastitis_milk'

		]);

	Route::get('report/weight',[
		'as'=>'report-weight',
		'uses'=>'ReportController@report_weight'

		]);
	
	
	

	




//Calendar Event
	Route::get('/calendar', function () {

	$data = [
		'page_title' => 'Home',
	];
	    return view('event/index', $data);
	});

	Route::resource('events', 'EventController');
	
	Route::get('calendar/api', function () {
		$events = DB::table('events')->select('id', 'name', 'title', 'start_time as start', 'end_time as end')->get();
		foreach($events as $event)
		{
			$event->title = $event->title . ' - ' .$event->name;
			$event->url = url('events/' . $event->id);
		}
		return $events;
	});

	


	

	

	

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
