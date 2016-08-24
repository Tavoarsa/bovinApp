<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

use BovinApp\Injecction;
use BovinApp\Badamecum;
use BovinApp\Animal;
use BovinApp\Event;
use Session;
use Auth;

class InjecctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $injecctions=  Injecction::where('idAnimal',Session::get('idAnimal'))->get();

        $slug=Animal::where('id',Session::get('idAnimal'))->pluck('slug');
        $slug= array_pull($slug,0);        

        return view('injecction.index',compact('injecctions','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $badamecums = Badamecum::all()->lists('name','name'); 
        return view('injecction.create',compact('badamecums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//dd($request);
        Session::put('injecctionName',$request->injecctionName);
        Session::put('dose',$request->dose);
             //Validaciones
        $rules =array(              
                        'diseaseName'              => 'required',                       
                        'injecctionName'              => 'required',                      
                        'dateApplication'          => 'required',
                        'dose'                     => 'required',
                        'responsible'              => 'required'  
                      );
        $this->validate($request,$rules);

        $injecction= new Injecction();
        $injecction->idUser= Auth::id();
        $injecction->idFarm=Session::get('idfarm');
        $injecction->idAnimal=Session::get('idAnimal');
        $injecction->diseaseName=$request->diseaseName;
        $injecction->injecctionName=$request->injecctionName;
        $injecction->dateApplication=$request->dateApplication;
        $injecction->boosterInjection=$request->boosterInjection;
        $injecction->dose=$request->dose;
        $injecction->value=$this->cost_injecction();
        $injecction->responsible=$request->responsible;

        $injecction->save();

         $event                  = new Event;
        $event->idUser =        Auth::id();
        //$event->allDay =    $request->has('visible') ? 1 : 0,
        $event->name            ='Injectar'; 
        $event->title           ='Vacunar al Animal:'.' '.  Session::get('animal');
        $event->properties      = '';
        $event->start_time      = $request->boosterInjection;
        $event->end_time        = $request->boosterInjection;
        $event->save();


        $message = $injecction ? 'Inyección aplicada correctamente!' : 'La Inyección  NO pudo agregarse!'; 
        return redirect() -> route('injecction-index')->with('message', $message);
    }


  /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $injecction = Injecction::findOrFail($id);
        $badamecums = Badamecum::all()->lists('name','name');        
        return view('injecction.edit', compact('injecction','badamecums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Injecction $injecction)
    {
        //dd($request);
       $injecction = Injecction::findOrFail($injecction->id); 

        $injecction->diseaseName=$request->diseaseName;
        $injecction->injecctionName=$request->injecction;
        $injecction->dateApplication=$request->dateApplication;
        $injecction->boosterInjection=$request->boosterInjection;
        $injecction->dose=$request->dose;
        $injecction->value=$request->value;
        $injecction->responsible=$request->responsible;  
              
        $updated = $injecction->save();//dd($updated);
        
        $message = $updated ? 'Inyección actualizada correctamente!' : ' La Inyección NO pudo actualizarse!';
        
        return redirect()->route('injecction-index')->with('message', $message);
    }

    public function cost_injecction()
    {
         $badamecums = Badamecum::where('name', Session::get('injecctionName'))
                                            ->get();
        

         foreach ($badamecums as $badamecum ) {
             
             $cost_injecction=$badamecum->price / Session::get('dose');

             return $cost_injecction;
         }
 
         


    }
}
