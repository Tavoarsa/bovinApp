<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Artificial_insemination extends Model
{
    protected $table ='artificial_inseminations';
	protected $fillable=['idAnimal','father','mother'];
	protected $guarded = ['id'];

	
	  public function animals()
    {
        return $this->belongsTo('BovinApp\Artificial_insemination', 'idAnimal');
    }
}
