<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Injecction extends Model
{
    protected $table ='injecctions';
	protected $fillable=['idUser','idFarm','idAnimal','diseaseName','injecctionName','dateApplication',
						'dose','value','responsible','boosterInjection'];
	protected $guarded = ['id'];
}
