<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use Session;

class DashboardController extends Controller
{
  

	public function get_farm(Request $request, $id)
	{
		Session::put('farm',$id);
		return	view('dashboard');
	}
}
