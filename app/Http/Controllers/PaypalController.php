<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
//Clases de la API De paypal
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use BovinApp\Order;
use BovinApp\OrderItem;


class PaypalController extends Controller
{
    private $_api_context;//Toda las configurtaciones y entornos.

	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function postPayment()
	{
		$payer = new Payer();//Cliente y metodo de pago 
		$payer->setPaymentMethod('paypal');

		$items = array();
		$subtotal = 0;
		$cart = \Session::get('cart');//Informaciion del carro
		$currency = 'USD';
		//Recorremos carro y por cada  producto creamos un objeto item: configuramos los datos segun paypal() por cada item
		foreach($cart as $producto){
			$item = new Item();
			$item->setName($producto->name)
			->setCurrency($currency)
			->setDescription($producto->extract)
			->setQuantity($producto->quantity)
			->setPrice($producto->price);
			$items[] = $item;
			$subtotal += $producto->quantity * $producto->price;
		}
		$item_list = new ItemList();//Config array item(contenido del carro.
		$item_list->setItems($items);
		$details = new Details();//Agregamos un costo del envio 
		$details->setSubtotal($subtotal)
		->setShipping(1);
		$total = $subtotal + 1;//Subtotal mas costo del envio
		$amount = new Amount();//save cantidad de total y envio moneda
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);
		$transaction = new Transaction();//
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Pedido de prueba en mi Laravel App Store');
		$redirect_urls = new RedirectUrls();//recibe ruta haci donde va
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));
		$payment = new Payment();//Se realiza el pago
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));
			//COnecion a PAYPAL y se revisa si todo esta bien 
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}
		//todo bien: Paypal devuelve informacion
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
		return \Redirect::route('cart-show')
			->with('error', 'Ups! Error desconocido.');
	}

	public function getPaymentStatus()
	{
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');
		// clear the session payment ID
		\Session::forget('paypal_payment_id');
		$payerId = \Input::get('PayerID');//vienen en la url 
		$token = \Input::get('token');
		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return \Redirect::route('store')
				->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}
		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Input::get('PayerID'));
		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);
		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar
			$this->saveOrder(\Session::get('cart'));
			\Session::forget('cart');
			return \Redirect::route('store')
				->with('message', 'Compra realizada de forma correcta');
		}
		return \Redirect::route('store')
			->with('message', 'La compra fue cancelada');
	}

	private function saveOrder($cart)
	{
	    $subtotal = 0;

	    foreach($cart as $item){
	        $subtotal += $item->price * $item->quantity;
	    }
	    
	    $order = Order::create([
	        'subtotal' => $subtotal,
	        'shipping' => 100,
	        'user_id' => \Auth::user()->id
	    ]);
	    //recorre mi carrito y lo guardo en la tabla orderItem
	    foreach($cart as $item){
	        $this->saveOrderItem($item, $order->id);
	    }
	}
	
	private function saveOrderItem($item, $order_id)
	{
		OrderItem::create([
			'quantity' => $item->quantity,
			'price' => $item->price,
			'product_id' => $item->id,
			'order_id' => $order_id
		]);
	}
}
