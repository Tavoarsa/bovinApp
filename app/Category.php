<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description'];
	public $timestamps = false;
/*Muchos productos 
pertencen a varias categorias.*/
	public function products()
	   {
        return $this->hasMany('BovinApp\Product');
    }
}
