<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Invitro_fertilization extends Model
{
    protected $table ='invitro_fertilizations';
	protected $fillable=['idAnimal','father','donorMother','receivingMother'];
	protected $guarded = ['id'];

	
	  public function animals()
    {
        return $this->belongsTo('BovinApp\Invitro_fertilization', 'idAnimal');
    }
}
