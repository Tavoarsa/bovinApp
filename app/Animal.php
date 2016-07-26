<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table ='animals';
	protected $fillable=['idUser','idFarm','slug','animalNumber','registrationNumber','name',
						'breed','gender','birthdate','deathdate','feature','image','status','status_deathDate'];
	protected $guarded = ['id'];

	/*Tipo de fecundación
	  del animal('monta natural', 
	  trasferecia de embriones)
	*/  

	public function origin()
	{
		return $this->hasMany('BovinApp\Animal', 'idAnimal');

	}
	
}
