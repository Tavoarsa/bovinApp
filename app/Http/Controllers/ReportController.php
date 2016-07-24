<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

Use BovinApp\Reproduction;
Use BovinApp\Production;
use BovinApp\Mastitis_milk;
use BovinApp\Animal;
use BovinApp\Injecction;
use BovinApp\Price_milk;
use BovinApp\Vaccine;
use BovinApp\Weight;
use Carbon\Carbon;
use Session;
use Auth;
use PDF;



class ReportController extends Controller
{

  public function index()
  {

        return view('report.dashboard');
  }

  public function report_vaccine()
  {
    $pdf= PDF::loadView('report.vaccine',['vaccines'=>$this->get_vaccines(),'animals'=>$this->get_animals()]);
    return $pdf->stream();
  }

  public function report_injecction()
  {
   $pdf= PDF::loadView('report.injecction',['injecctions'=>$this->get_injecctions(),'animals'=>$this->get_animals()]);
    return $pdf->stream();
  }  
  

  public function report_veterinary()
  {
    $pdf= PDF::loadView('report.veterinary',['vaccines'=>$this->get_vaccines(),'animals'=>$this->get_animals()],['injecctions'=>$this->get_injecctions()]);
    return $pdf->stream();
  }  

    public function report_reproduction()
    { 
          
      
       $reproductions= Reproduction::where('idAnimal',Session::get('idAnimal'))->get();
       $pdf= PDF::loadView('report.reproduction',['reproductions'=>$reproductions],['animals'=>$this->get_animals()]);
       return $pdf->stream();
    }

    public function report_production()
    { 
         
       $productions= Production::where('idAnimal',Session::get('idAnimal'))->get();
       $pdf= PDF::loadView('report.production',['productions'=>$productions],['animals'=>$this->get_animals()]);
       return $pdf->stream();
    }


    public function mastitis_milk()
    {  
 
                    

       $productions= Production::where('productions.idAnimal',Session::get('idAnimal'))
                                ->Where('mastitis_morning',true)  
                                ->orWhere('mastitis_later',true)                         
                                ->get();
                                

       $morning_production= Production::where('productions.idAnimal',Session::get('idAnimal'))
                                ->where('mastitis_morning',true)                                
                                ->select('productions.morning_production')                                
                                ->get();
        $later_production= Production::where('productions.idAnimal',Session::get('idAnimal'))
                                ->where('mastitis_later',true)
                                
                                ->select('productions.later_production')                                
                                ->get();

        $prices=Price_milk::where('idUser',Auth::id())->get();
        $prices=$prices->last();

        $quantity=$later_production->sum('later_production')+$morning_production->sum('morning_production'); 
        $value= $prices->price*$quantity;
        



       $pdf= PDF::loadView('report.mastitis_milk',['productions'=>$productions,'animals'=>$this->get_animals() ],['value'=>$value,'quantity'=>$quantity]);
       return $pdf->stream();
    }

    public function animals_mastitis()
    {
       $animals_mastitis= Animal::where('animals.idUser',Auth::id())                              
                              ->join('productions','productions.idUser','=','animals.idUser')
                              ->where('mastitis_morning',true)
                              ->orWhere('mastitis_later',true) 
                              ->select('animals.name','productions.date','productions.mastitis_morning','productions.mastitis_later')                            
                                 
                                 ->get(); 
     //dd($animals_mastitis);
          $pdf= PDF::loadView('report.animals_mastitis',['animals_mastitis'=>$animals_mastitis]);
       return $pdf->stream();                          
    }


    public function report_weight()
    {  
      
       $weights= Weight::where('idAnimal',Session::get('idAnimal'))->get();
       $pdf= PDF::loadView('report.weight',['weights'=>$weights],['animals'=>$this->get_animals()]);
       return $pdf->stream();
    }


    public function get_animals()
    {
      $animals= Animal::where('slug',Session::get('animal'))->first(); 
      return $animals;

    }

    public function get_vaccines()
    {

      $vaccines= Vaccine::where('idAnimal',Session::get('idAnimal'))
                           ->join('animals','animals.id','=','vaccines.idAnimal')
                           ->select('animals.name','vaccines.diseaseName','vaccines.vaccineName','vaccines.dateApplication',
                                    'vaccines.boosterInjection','vaccines.dose','vaccines.responsible')
                        ->get(); 
      return $vaccines;

    }

    public function get_injecctions()
    {

      $injecctions= Injecction::where('idAnimal',Session::get('idAnimal'))
                              ->join('animals','animals.id','=','injecctions.idAnimal')
                              ->select('animals.name','injecctions.diseaseName','injecctions.injecctionName','injecctions.dateApplication',
                                    'injecctions.boosterInjection','injecctions.dose','injecctions.responsible')
                              ->get(); 
      return $injecctions;

    }

    

}
