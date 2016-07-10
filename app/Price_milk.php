<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Price_milk extends Model
{ 
	protected $table ='price_milks';
	protected $fillable=['idUser','date','price','details'];
	protected $guarded = ['id'];
}
