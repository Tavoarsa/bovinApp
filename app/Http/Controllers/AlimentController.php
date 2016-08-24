<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

use BovinApp\Aliment;
use BovinApp\Animal;
use BovinApp\Product;
use Session;
use Auth;

class AlimentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aliments=  Aliment::where('idAnimal',Session::get('idAnimal'))->get();

        $slug=Animal::where('id',Session::get('idAnimal'))->pluck('slug');
        $slug= array_pull($slug,0);        

        return view('aliment.index',compact('aliments','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $products = Product::all()->lists('name','name');
        
        return view('aliment.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::put('alimentName',$request->alimentName);
        Session::put('dose',$request->dose);
             //Validaciones
        $rules =array(                                        
                        'alimentName'              => 'required',                      
                        'dateApplication'          => 'required',
                        'dose'                     => 'required',
                        'responsible'              => 'required'  
                      );
        $this->validate($request,$rules);

        $aliment= new Aliment();
        $aliment->idUser= Auth::id();
        $aliment->idFarm=Session::get('idfarm');
        $aliment->idAnimal=Session::get('idAnimal');      
        $aliment->alimentName=$request->alimentName;
        $aliment->dateApplication=$request->dateApplication;        
        $aliment->dose=$request->dose;
        $aliment->value=$this->cost_aliment();
        $aliment->responsible=$request->responsible;

        $aliment->save();


        $message = $aliment ? 'Alimento aplicado correctamente!' : 'El Alimento  NO pudo agregarse!'; 
        return redirect() -> route('aliment-index')->with('message', $message);
    }


  /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aliment = Aliment::findOrFail($id);
        $products = Product::all()->lists('name','name');        
        return view('aliment.edit', compact('aliment','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aliment $aliment)
    {
        $aliment->fill($request->all());
              
        $updated = $aliment->save();
        
        $message = $updated ? 'Alimento actualizado correctamente!' : 'El Alimento NO pudo actualizarse!';
        
        return redirect()->route('aliment-index')->with('message', $message);
    }

      public function cost_aliment()
    {
         $products = Product::where('name', Session::get('alimentName'))
                                            ->get();

         foreach ($products as $product ) {
             
             $cost_aliment=$product->price / Session::get('dose');

             return $cost_aliment;
         }
 
         


    }
}
