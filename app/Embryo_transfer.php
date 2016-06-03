<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Embryo_transfer extends Model
{
    protected $table ='embryo_transfers';
	protected $fillable=['idAnimal','father','donorMother','receivingMother'];
	protected $guarded = ['id'];

	
	  public function animals()
    {
        return $this->belongsTo('BovinApp\Embryo_transfer', 'idAnimal');
    }
}
