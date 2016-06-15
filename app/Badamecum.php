<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Badamecum extends Model
{
    protected $table = 'badamecums';
	protected $fillable = ['name', 'slug', 'description', 'extract', 'image', 'visible', 'price', 'category_id','indications','active_ingredients','presentation','retirement','size',];
    
    // Relation with Category
    public function category()
    {
        return $this->belongsTo('BovinApp\BademecumCategory');
    }
}
