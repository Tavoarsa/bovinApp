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
use Auth;
use PDF;



class ReportController extends Controller
{

  

    public function report_reproduction()
    {  
       $animals= Animal::where('slug',Session::get('animal'))->first();   //dd($animals);
       $reproductions= Reproduction::where('idAnimal',Session::get('idAnimal'))->get();
       $pdf= PDF::loadView('report.reproduction',['reproductions'=>$reproductions],['animals'=>$animals]);
       return $pdf->stream();
    }

    public function report_production()
    {  

       $animals= Animal::where('slug',Session::get('animal'))->first();  
       $productions= Production::where('idAnimal',Session::get('idAnimal'))->get();
       $pdf= PDF::loadView('report.production',['productions'=>$productions],['animals'=>$animals]);
       return $pdf->stream();
    }


    public function mastitis_milk()
    {  

      

       $productions= Production::where('productions.idAnimal',Session::get('idAnimal'))
                                ->orwhere('mastitis_morning',true)  
                                ->orwhere('mastitis_later',true)                            
                                ->join('animals','animals.id','=','productions.idAnimal')
                                ->join('price_milks','price_milks.idFarm','=',Session::get('idFarm'))
                                ->select('animals.name','productions.date','productions.later_production','productions.morning_production','productions.mastitis_morning','productions.mastitis_later')
                                ->get();

       $morning_production= Production::where('productions.idAnimal',Session::get('idAnimal'))
                                ->where('mastitis_morning',true)                                
                                ->select('productions.morning_production')                                
                                ->get();
        $later_production= Production::where('productions.idAnimal',Session::get('idAnimal'))
                                ->where('mastitis_later',true)
                                
                                ->select('productions.later_production')                                
                                ->get();      

       $total= collect(
        ['price'=> ($morning_production->sum('morning_production')*Session::get('price_milk')) + ($later_production->sum('later_production')*Session::get('price_milk')),

        'quantity' =>($morning_production->sum('morning_production')) + ($later_production->sum('later_production'))

        ]);
       $total->toArray();

dd($productions);

      /* $total->put('price',($morning_production->sum('morning_production')*Session::get('price_milk')) + ($later_production->sum('later_production')*Session::get('price_milk')));
       $total->put('quantity',($morning_production->sum('morning_production')) + ($later_production->sum('later_production')));*/

       $pdf= PDF::loadView('report.mastitis_milk',['total'=>$total],['productions'=>$productions]);
       return $pdf->stream();
    }

    public function report_weight()
    {  
       $animals= Animal::where('slug',Session::get('animal'))->first();   //dd($animals);
       $weights= Weight::where('idAnimal',Session::get('idAnimal'))->get();
       $pdf= PDF::loadView('report.weight',['weights'=>$weights],['animals'=>$animals])->save('file_pdf');
       return $pdf->stream();
    }

    

}
