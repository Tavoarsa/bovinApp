<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

use BovinApp\Farm;

class FrontController extends Controller
{
    public function index()
    { 
    	return view('main.index');

    }
    public function cotacto(){

    	return view('cotacto');
    }

    public function admin()
    {

    	return view('admin.index');
    }
    public function search(Request $request)
    {
        
        $farms=Farm::where('name', 'ILIKE', '%' . trim($request -> get(trim('name'))) . '%') -> get();

        return view('main.search',compact('farms'));   
    }

     public function info_farm(Request $request)
    {
        
        $farms=Farm::where('id', $request->id)->get();
        //dd($farms);

        return view('main.info_farm',compact('farms'));   
    }
}
 
 