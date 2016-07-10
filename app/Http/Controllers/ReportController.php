<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

Use BovinApp\Reproduction;
Use BovinApp\Production;
use BovinApp\Mastitis_milk;
use BovinApp\Animal;
use BovinApp\Weight;
use Carbon\Carbon;
use Session;
use PDF;



class ReportController extends Controller
{

  public function __construct()
  {
  
    if(!\Session::has('matitis_milk')) \Session::put('matitis_milk',array());//si no existe "matitis_milk" la crea, guardamos un array vacio
  }


    public function report_reproduction()
    {  
       $animals= Animal::where('slug',Session::get('animal'))->first();   //dd($animals);
       $reproductions= Reproduction::where('idAnimal',Session::get('idAnimal'))->get();
       $pdf= PDF::loadView('report.reproduction',['reproductions'=>$reproductions],['animals'=>$animals]);
       return $pdf->stream();
    }

    public function report_production()
    {  

       $animals= Animal::where('slug',Session::get('animal'))->first();   //dd($animals);
       $productions= Production::where('idAnimal',Session::get('idAnimal'))->get();

        foreach ($productions as $production) {

            if($production->mastitis_morning==true  || $production->mastitis_later==true ){

               $matitis_milk[]= $production->date; //add information of slug "product" and save in array "cart".
                
            }
            
        }
        dd($matitis_milk);

       $pdf= PDF::loadView('report.production',['productions'=>$productions],['animals'=>$animals]);
       return $pdf->stream();
    }

    public function report_weight()
    {  
       $animals= Animal::where('slug',Session::get('animal'))->first();   //dd($animals);
       $weights= Weight::where('idAnimal',Session::get('idAnimal'))->get();
       $pdf= PDF::loadView('report.weight',['weights'=>$weights],['animals'=>$animals]);
       return $pdf->stream();
    }

    

}
