<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Email_list extends Model
{
     protected $table ='email_lists';
	protected $fillable=['idUser','idAnimal','user','email','file_list'];
	protected $guarded = ['id'];
}
