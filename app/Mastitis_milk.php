<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Mastitis_milk extends Model
{

	protected $table ='mastitis_milks';
	protected $fillable=['idUser','idAnimal','idFarm','date','quantity','price_mastitis_milk'];
	protected $guarded = ['id'];


}
