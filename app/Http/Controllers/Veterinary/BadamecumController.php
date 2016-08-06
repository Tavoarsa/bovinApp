<?php

namespace BovinApp\Http\Controllers\Veterinary;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use BovinApp\Http\Controllers\Controller;

use BovinApp\Badamecum;
use Session;

class BadamecumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farm= Session::get('farm');
        $badamecums = \DB::table('categories')
                                ->join('badamecums','badamecums.category_id','=','categories.id')
                                ->select('categories.name','badamecums.name')      
                                ->paginate(6);dd($badamecums);
        return view('veterinary.badamecum.index', compact('badamecums','farm'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Badamecum $badamecum)
    {
        
        $badamecum= Badamecum::where('slug',$badamecum->slug)->first();
        return view('veterinary.badamecum.show',compact('badamecum'));

    }

   
}
