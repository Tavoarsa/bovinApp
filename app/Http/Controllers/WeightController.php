<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

use BovinApp\Animal;
use BovinApp\Weight;
use BovinApp\Price_weight;
use Auth;
use Session;

class WeightController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
        $animals= Animal::where('slug',Session::get('animal'))->first();
        $price_weight= Price_weight::where('idUser', Auth::id())->pluck('price');
        $price_weight= $price_weight->last();//dd($price_weight);
        //ultimo valor de la collection
        Session::put('price_weight',$price_weight);     

        $weights= Weight::where('idAnimal',$animals->id)->get();//dd($weights);
        return view('weight.index',compact('weights','animals','price_weight'));
        
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
                        
                        'date'          		=> 'required',
                        'weight'    			=> 'required|integer'                     
                      );
        $this->validate($request,$rules);
        
        
        $weight= new Weight();
        $weight->idUser= Auth::id();
        $weight->idFarm= Session::get('farm');
        $weight->idAnimal=Session::get('idAnimal');
        $weight->date=$request->date;
        $weight->weight=$request->weight;
        $weight->price_weight= $request->weight * Session::get('price_weight');
        $weight->save();

       
        $message = $weight ? 'Registro agregado correctamente!' : 'El Registro NO pudo agregarse!'; 
        return redirect() -> route('weight-index')->with('message', $message);
                   
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weight = Weight::findOrFail($id);   
        return view('weight.edit',compact('weight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weight $weight)
    {

    	       //Validaciones
        $rules =array(         
                        
                        'date'          		=> 'required',
                        'weight'    			=> 'required|integer'                     
                      );
        $this->validate($request,$rules);
       
       $weight = Weight::findOrFail($weight->id);
       $weight->weight=$request->weight; 

       
      $weight->price_weight= $request->weight * Session::get('price_weight');
              
        $updated = $weight->save();
        
        $message = $updated ? 'Registro actualizado correctamente!' : 'EL Registro NO pudo actualizarse!';
        
        return redirect()->route('weight-index')->with('message', $message);
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
