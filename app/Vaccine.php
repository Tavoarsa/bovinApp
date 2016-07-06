<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $table ='vaccines';
	protected $fillable=['idUser','idFarm','idAnimal','diseaseName','vaccineName','dateApplication',
						'dose','value','responsible','boosterInjection'];
	protected $guarded = ['id'];
}

