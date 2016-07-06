<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Aliment extends Model
{
    protected $table ='aliments';
	protected $fillable=['idUser','idFarm','idAnimal','alimentName','dateApplication',
						'dose','value','responsible'];
	protected $guarded = ['id'];
}

 