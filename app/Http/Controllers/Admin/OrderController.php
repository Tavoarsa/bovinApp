<?php

namespace BovinApp\Http\Controllers\Admin;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use BovinApp\Http\Controllers\Controller;


use BovinApp\Order;
use BovinApp\OrderItem;


class OrderCOntroller extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(5);
        //dd($orders);
        return view('admin.order.index', compact('orders'));
    }
    public function getItems(Request $request)
    {
        dd($request);
        $items = OrderItem::with('product')->where('order_id', $request->get('order_id'))->get();
        return json_encode($items);
    }
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        
        $deleted = $order->delete();
        
        $message = $deleted ? 'Pedido eliminado correctamente!' : 'El Pedido NO pudo eliminarse!';
        
        return redirect()->route('admin.order.index')->with('message', $message);
    }
}
