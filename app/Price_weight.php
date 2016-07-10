<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Price_weight extends Model
{
    protected $table ='price_weights';
	protected $fillable=['idUser','date','price','details'];
	protected $guarded = ['id'];
}
