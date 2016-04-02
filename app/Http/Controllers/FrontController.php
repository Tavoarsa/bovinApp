<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

class FrontController extends Controller
{
    public function index()
    { 
    	return view('index');

    }
    public function cotacto(){

    	return view('cotacto');
    }

     public function admin(){

    	return view('admin.index');
    }
}
