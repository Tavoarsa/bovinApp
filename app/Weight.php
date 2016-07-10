<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
     protected $table = 'weights';
	protected $fillable = ['idUser','idFarm','idAnimal','date','weight','price_weight'];

	protected $guarded = ['id'];
}

