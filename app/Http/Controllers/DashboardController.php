<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use Session;
use BovinApp\Farm;


class DashboardController extends Controller
{
  

	public function get_farm($slug)
	{
		$farm = Farm::where('slug',$slug)->first(); 
		//INSERCCIÓN DE SLUG DE LA FINCA SELECCIONADA 		
		Session::put('farm',$slug);
		Session::put('idfarm',$farm->id);			
		return	view('dashboard');
	}


	public function get_id_farm($id)
	{
		//INSERCCIÓN DE SLUG DE LA FINCA SELECCIONADA 		
			
		return	view('dashboard');
	}

}

	
