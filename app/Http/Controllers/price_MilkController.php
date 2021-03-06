<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use BovinApp\Price_milk;
use Carbon\Carbon;
use Auth;
use Session;

class price_MilkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                        
                        'price'                  => 'required',
                        'details'                => 'required'                     
                      );
        $this->validate($request,$rules);
        $milk_price= new Price_milk();
        $milk_price->idUser=Auth::id();
        $milk_price->date=Carbon::today();
        $milk_price->idFarm= Session::get('idfarm');
        $milk_price->price=$request->price;
        $milk_price->details=$request->details;
        $milk_price->save();              //operador ternario
        $message = $milk_price ? 'Precio Actualizado correctamente!' : 'Precio no actualizado!';
            
        return redirect()->route('production-index')->with('message', $message);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
