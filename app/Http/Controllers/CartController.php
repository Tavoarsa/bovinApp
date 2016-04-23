<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use BovinApp\Product;


class CartController extends Controller
{

	public function __construct()
	{
	
		if(!\Session::has('cart')) \Session::put('cart',array());//si no existe "cart" la crea, guardamos un array vacio
	}
	//show cart
	public function show(Request $request)
	{
		//Get var session, save val locar, add, delete item in var
		//save var local  in var session.

		 $cart = $request->session()->get('cart');
		 $total=$this->total();//LO que devuelve le metodo total()
		 return	view('store.cart',compact('cart','total'));
	}

	//add item
	public function add(Request $request, Product $product)
	{
		
		$cart =$request->session()->get('cart');	
		$product->quantity=1; // cantidad 
		$cart[$product->slug]= $product;//add information of slug "product" and save in array "cart".		
		$request->session()->put('cart',$cart);//update


		return redirect()->route('cart-show') ;
	}

	//delete item
	public function delete(Request $request,Product $product)
	{
		$cart =\Session::get('cart');

		unset($cart[$product->slug]);//INyeccion de dependencia realiza en la ruta
		$request->session()->put('cart',$cart);
		return redirect()->route('cart-show');
	}

	//update item
	public function update(Request $request,Product $product,$quantity)
	{
		
		$cart =$request->session()->get('cart');

		$cart[$product->slug]->quantity=$quantity;
		$request->session()->put('cart',$cart);
		//dd($cart);
		return redirect()->route('cart-show');
	}

	//trash item
	public function trash()
	{
		\Session::forget('cart');
		return redirect()->route('cart-show');
	}

	//total 
	private function total()
    {
    	$cart =\Session::get('cart');
    	$total=0;
    	foreach ($cart as $item) 
    	{
    		$total += $item->price * $item->quantity;
    	}
    	return $total;
    }

    //Producto Detail
    public function orderDetail()
    {
    	/*Validamos  si hay item o no se ha iniciado seccion.*/
     if(count(\Session::get('cart')) <= 0) return redirect()->route('store');
        $cart = \Session::get('cart');
        $total = $this->total();
        return view('store.order-detail', compact('cart', 'total'));
       
    }
}
