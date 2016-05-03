<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
	protected $fillable = ['price', 'quantity', 'product_id', 'order_id'];
	public $timestamps = false;

	//Cada uno de los items va a pertenecer a una orden.
	public function order()
	{
		return $this->belongsTo('BovinApp\Order');

	}

	//Por cada item de una orde esta relacionada a un producto
	public function product()
	{
		return $this->belongsTo('BovinApp\Product');
	}
}
