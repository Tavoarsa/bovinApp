<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use Session;
use BovinApp\Farm;


class DashboardController extends Controller
{
  

	public function get_farm($id)
	{
		//INSERCCIÓN DE SLUG DE LA FINCA SELECCIONADA 		
		Session::put('farm',$id);		
		return	view('dashboard');
	}
}

	
