<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

use BovinApp\Vaccine;
use BovinApp\Animal;
use BovinApp\Badamecum;
use BovinApp\Event;
use Session;
use Auth;


class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccines=  Vaccine::where('idAnimal',Session::get('idAnimal'))->get();//dd($vaccines);

        $slug=Animal::where('id',Session::get('idAnimal'))->pluck('slug');
        $slug= array_pull($slug,0);        

        return view('vaccine.index',compact('vaccines','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $badamecums = Badamecum::all()->lists('name','name'); 

        return view('vaccine.create',compact('badamecums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

        Session::put('vaccineName',$request->vaccineName);
        Session::put('dose',$request->dose);
        
             //Validaciones
        $rules =array(              
                        'diseaseName'              => 'required',                       
                        'vaccineName'              => 'required',                      
                        'dateApplication'          => 'required',
                        'dose'                     => 'required',
                        'responsible'              => 'required',
                        'boosterInjection'         => 'required'

                      );
        $this->validate($request,$rules);

        $vaccine= new Vaccine();
        $vaccine->idUser= Auth::id();
        $vaccine->idFarm=Session::get('idfarm');
        $vaccine->idAnimal=Session::get('idAnimal');
        $vaccine->diseaseName=$request->diseaseName;
        $vaccine->vaccineName=$request->vaccineName;
        $vaccine->dateApplication=$request->dateApplication;
        $vaccine->boosterInjection=$request->boosterInjection;
        $vaccine->dose=$request->dose;
        $vaccine->value=$this->cost_vaccine();
        $vaccine->responsible=$request->responsible;

        $vaccine->save();
       // $time = explode(" - ", $request->input('time'));

        $event                  = new Event;
        $event->idUser =        Auth::id();
        //$event->allDay =    $request->has('visible') ? 1 : 0,
        $event->name            ='Vacunación'; 
        $event->title           ='Vacunar al Animal:'.' '.  Session::get('animal');
        $event->properties      = '';
        $event->start_time      = $request->boosterInjection;
        $event->end_time        = $request->boosterInjection;
        $event->save();


        $message = $vaccine ? 'Vacuna aplicada correctamente!' : 'La vacuna  NO pudo agregarse!'; 
        return redirect() -> route('vaccine-index')->with('message', $message);   
        
        
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $vaccine = Vaccine::findOrFail($id);        
        $badamecums = Badamecum::all()->lists('name','name'); // dd($badamecums);
       

        return view('vaccine.edit', compact('vaccine','badamecums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccine $vaccine)
    {
        
        $vaccine = Vaccine::findOrFail($vaccine->id); 

        $vaccine->diseaseName=$request->diseaseName;
        $vaccine->vaccineName=$request->vaccineName;
        $vaccine->dateApplication=$request->dateApplication;
        $vaccine->boosterInjection=$request->boosterInjection;
        $vaccine->dose=$request->dose;
        $vaccine->value=$request->value;
        $vaccine->responsible=$request->responsible;     
     
       
      
                     
        $updated = $vaccine->save();
        
        $message = $updated ? 'Vacuna actualizada correctamente!' : ' La vacuna NO pudo actualizarse!';
        
        return redirect()->route('vaccine-index')->with('message', $message);
    }

    public function cost_vaccine()
    {
         $badamecums = Badamecum::where('name', Session::get('vaccineName'))
                                            ->get();

         foreach ($badamecums as $badamecum ) {
             
             $cost_vaccine=$badamecum->price / Session::get('dose');

             return $cost_vaccine;
         }
 
         


    }

    
    
}
