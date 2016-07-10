<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'productions';
	protected $fillable = ['idUser','idFarm','idAnimal','date','morning_production','later_production','total_production','price_production'];

	protected $guarded = ['id'];
}
