<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farm extends Model
{
	  //use SoftDeletes;
	  /*
	  **
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    
	protected $table ='farms';
	protected $fillable=['idUser','name','address','agent','operationCertificate','exploitation','patent'];
	protected $guarded = ['id'];
}
