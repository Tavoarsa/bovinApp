<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

use BovinApp\Animal;
use BovinApp\Production;
use BovinApp\Price_milk;

use Auth;
use Session;

class ProductionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
        $animals= Animal::where('slug',Session::get('animal'))->first();
        $price_milk= Price_milk::where('idUser', Auth::id())->pluck('price');
        $price_milk= $price_milk->last();//dd($price_milk);
        //ultimo valor de la collection
        Session::put('price_milk',$price_milk);
        $slug=Animal::where('id',Session::get('idAnimal'))->pluck('slug');
        $slug= array_pull($slug,0);            

        $productions= Production::where('idAnimal',$animals->id)->get();//dd($productions);          


        return view('production.index',compact('productions','animals','price_milk','slug'));
        
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
                        'morning_production'    => 'required'                     
                      );
        $this->validate($request,$rules);
        
        $production= new Production();
        $production->idUser= Auth::id();
        $production->idFarm= Session::get('idfarm');
        $production->idAnimal=Session::get('idAnimal');
        $production->mastitis_morning=$request->has('mastitis_morning') ? 1 : 0;
        $production->mastitis_later=$request->has('mastitis_later') ? 1 : 0;
        $production->date=$request->date;
        $production->morning_production=$request->morning_production;
        $production->price_production= $request->morning_production * Session::get('price_milk');
        $production->save();
       
        $message = $production ? 'Registro agregado correctamente!' : 'El Registro NO pudo agregarse!'; 
        return redirect() -> route('production-index')->with('message', $message);
                   
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $production = Production::findOrFail($id);   
        return view('production.edit',compact('production'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        $rules =array(        
                        
                        'date'                  => 'required',
                        'morning_production'    => 'required',
                        'later_production'      => 'required'                         
                      );
        $this->validate($request,$rules);

       
       $production = Production::findOrFail($production->id);
       $production->morning_production=$request->morning_production;
       $production->later_production= $request->later_production;     

       $production->total_production=$request->morning_production + $request->later_production;
       $production->price_production= ($request->morning_production + $request->later_production)* Session::get('price_milk');

       $production->mastitis_morning=$request->has('mastitis_morning') ? 1 : 0;
       $production->mastitis_later=$request->has('mastitis_later') ? 1 : 0;
              
        $updated = $production->save();
        
        $message = $updated ? 'Registro actualizado correctamente!' : 'EL Registro NO pudo actualizarse!';
        
        return redirect()->route('production-index')->with('message', $message);
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
