<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable = ['subtotal', 'shipping', 'user_id'];

    //Relation with user: Cada pedido va a pertenecer un usuario.
    public function user()
    {
    	return $this->belongsTo('BovinApp\User');
    }
    //cada uno de nuestros pediddos tien varios items. 
    public function orders_item()
    {
    	return $this->hasMany('BovinApp\OrderItem');
    }
}
