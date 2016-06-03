<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Natural_mating extends Model
{
    protected $table ='natural_matings';
	protected $fillable=['idAnimal','mother','father'];
	protected $guarded = ['id'];

	
	  public function animals()
    {
        return $this->belongsTo('BovinApp\Natural_mating', 'idAnimal');
    }
}
