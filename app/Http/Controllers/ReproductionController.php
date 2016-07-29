<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

use BovinApp\Animal;
use BovinApp\Reproduction;
use Auth;
use Session;

class ReproductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
        $animals= Animal::where('slug',Session::get('animal'))->first();  
        $reproductions= Reproduction::where('idAnimal',$animals->id)->get();
        return view('reproduction.index',compact('reproductions','animals'));
        
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
              //Validaciones
        $rules =array(         
                        
                        'heat_date'          => 'required'                         
                      );
        $this->validate($request,$rules);
        
        $production= new Reproduction();
        $production->idAnimal=Session::get('idAnimal');
        $production->heat_date=$request->heat_date;
        $production->save();

       
        $message = $production ? 'Registro agregado correctamente!' : 'El Registro NO pudo agregarse!'; 
        return redirect() -> route('reproduction-index')->with('message', $message);
                   
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reproduction = Reproduction::findOrFail($id);   
        return view('reproduction.edit',compact('reproduction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reproduction $reproduction)
    {
       $reproduction->fill($request->all());       
        $updated = $reproduction->save();
        
        $message = $updated ? 'Registro actualizado correctamente!' : 'EL Registro NO pudo actualizarse!';
        
        return redirect()->route('reproduction-index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
