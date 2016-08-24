<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use Session;
use BovinApp\Animal;
use BovinApp\Vaccine;
use BovinApp\Injecction;
use BovinApp\Aliment;
use BovinApp\Price_milk;
use BovinApp\Weight;
use Auth;
use BovinApp\Production;
use Lava;

use Khill\Lavacharts\Lavacharts;

class ProfitabilityController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Request $request)
   {


    $animal=$this->get_animal();
    $cost_injecction=$this->cost_injecction();
    $cost_vaccine=$this->cost_vaccine();
    $total_gastos=$this->total_gastos();
     $cost_aliment= $this->cost_aliment(); 

   foreach ($animal as $animals ) {

            $gender=$animals->gender;     
   }

   if($gender=="hembra"){

     $production=$this->total_production();

    $total_production= $production->sum('total_production');

    $price_production= $production->sum('price_production'); 


    $value_mastitis_milk=$this->value_mastitis_milk();
    $total_production_matitis=$this->mastitis_morning()+$this->mastitis_later();

    $total_production_good= $total_production - $total_production_matitis;
    $value_production_good= $price_production - $value_mastitis_milk;

   

    $receipts=$value_production_good - $total_gastos; 


    $reasons = Lava::DataTable();

    $reasons->addStringColumn('Reasons')
        ->addNumberColumn('Percent')
        ->addRow(['Ingresos Efectivos', $value_production_good])        
        ->addRow(['Ingresos No Efectivos', $value_mastitis_milk])
        ->addRow(['Gastos', $this->total_gastos()]);


    Lava::PieChart('IMDB', $reasons, [
        'title'  => 'Rentabilida Animal ',
        'is3D'   => true,
        'slices' => 
            [
                ['offset' => 0.2],
                ['offset' => 0.25],
                ['offset' => 0.3]
             ]
    ]);
   
     return view('profitability.show',compact('animal','cost_aliment','cost_injecction','cost_vaccine','total_gastos','receipts','total_production','price_production','value_mastitis_milk','total_production_matitis','total_production_good','value_production_good')); 


   }else{



    $total_weights=$this->get_total_weight();//dd($total_weights);

    $weight_last= $this->get_weight(); 

    
     
    $receipts= $weight_last - $total_gastos; 

     $reasons = Lava::DataTable();

    $reasons->addStringColumn('Reasons')
        ->addNumberColumn('Percent')
        ->addRow(['Posible Valor',$weight_last])   
        ->addRow(['Gastos',$this->total_gastos()]);


    Lava::PieChart('IMDB', $reasons, [
        'title'  => 'Rentabilida Animal ',
        'is3D'   => true,
        'slices' => 
            [
                ['offset' => 0.2],
                ['offset' => 0.25],
                ['offset' => 0.3]
             ]
    ]);
   
     return view('profitability.show_male',compact('animal','cost_aliment','cost_injecction','cost_vaccine','total_gastos','receipts','total_weights','weight_last'));
   }

           

       //dd($this->receipts());

        
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
    public function cost_aliment()
    {
        $aliment= Aliment::where('idAnimal',Session::get('idAnimal'))
                        ->get();
        $total=$aliment->sum('value');
        return $total;
    }


      public function get_total_weight()
    {
        $weights= Weight::where('idAnimal',Session::get('idAnimal'))                    
                    ->get();
        
        return $weights;
        
    }
   

      public function get_weight()
    {
        $weights= Weight::where('idAnimal',Session::get('idAnimal'))
                    ->select('price_weight')
                    ->get();
        
         $total=$weights->sum('price_weight');
        return $total;
    }
        
    

    public function get_animal()
    {
        $animal= Animal::where('id',Session::get('idAnimal'))
                        ->get();
        return $animal;
    }

    //Get costo del total de vacunas aplicadas a un animal.

    public function cost_vaccine()
    { 
        $vaccine= Vaccine::where('idAnimal',Session::get('idAnimal'))
                        ->get();
        $total=$vaccine->sum('value');
        return $total;
    }

    //Get costo del total de injeccione aplicadas a un animal.

    public function cost_injecction()
    { 
        $injecction= Injecction::where('idAnimal',Session::get('idAnimal'))
                        ->get();
        $total=$injecction->sum('value');
        return $total;
    }

      public function total_gastos()
    {        
        $total=$this->cost_vaccine()+$this->cost_injecction()+$this->cost_aliment();
        return $total;
    }

    //Ganancia: Total de produccion - leche con mastitis(no genera ganancia)
    public function receipts()
    {  
        foreach ($this->total_production() as $total_production) 
        {

            $total_production=$total_production->price_production-$this->value_mastitis_milk();
            return $total_production;
        }   
      
    }

    //Total de la producción lechera
    public function  total_production()
    {        
        $production= Production::where('idAnimal',Session::get('idAnimal'))
                                ->select('total_production','price_production')
                                ->get();
        return $production;
        
    }
    public function value_mastitis_milk()
    {        
       //Cantidad de leche con mastitis. 
        $quantity_production_mastitis= $this->mastitis_later() + $this->mastitis_morning();
        //Valor de la cantida de leche con mastitis.
        $price_milk_mastitis= $quantity_production_mastitis * $this->get_price();

        return $price_milk_mastitis;

    }


    public function mastitis_morning()
    {
        
        $morning_production= Production::where('productions.idAnimal',Session::get('idAnimal'))
                                ->where('mastitis_morning',true)                                
                                ->select('productions.morning_production')                                
                                ->get();
        $morning_production= $morning_production->sum('morning_production'); 

        return $morning_production;

    }

    public function mastitis_later()
    {
        
        $later_production= Production::where('productions.idAnimal',Session::get('idAnimal'))
                                ->where('mastitis_later',true)
                                
                                ->select('productions.later_production')                                
                                ->get();

         $later_production= $later_production->sum('later_production');

        return $later_production;

    }

    public function get_price()
    {
        $prices=Price_milk::where('idUser',Auth::id())
                            ->select('price')
                            ->get();
        $prices=$prices->last();
        return $prices->price;

    }
   


}
