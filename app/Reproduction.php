<?php

namespace BovinApp;

use Illuminate\Database\Eloquent\Model;

class Reproduction extends Model
{
    protected $table ='reproductions';
	protected $fillable=['idAnimal','heat_date','fertilization','likely_date','palpation_date','parturition',
						'gender','interval_parturition','abortion_date','months_gestation','open_period'];
	protected $guarded = ['id'];
}


