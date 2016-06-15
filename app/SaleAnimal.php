<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class SaleAnimal extends Model
{
    protected $table = 'sale_animals';
	protected $fillable = ['idUser','idFarm','name', 'slug', 'age', 'breed', 'image', 'gender', 'price', 'registrationNumber','farm','feature','seller_name','address','phone','email','details'];
	protected $guarded = ['id'];
}

 