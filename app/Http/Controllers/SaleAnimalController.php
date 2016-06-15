<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;

use BovinApp\Animal;
use BovinApp\User;
use BovinApp\SaleAnimal;
use BovinApp\Farm;
use Auth;
use Carbon\Carbon;
use Session;

class SaleAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
       $sale = SaleAnimal::where('idUser',Auth::id())
                            ->where('slug',$slug)
                ->first();//dd($sale);

        return view('animal.sale',compact('sale'));
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //get animal and user
        $animal=Animal::where('id',$request->id)->first(); 
        //$status_animal= Animal::findOrFail($animal->id);       
        $user= User::where('id',Auth::id())->first();
        $farm= Farm::where('id',Session::get('farm'))->first();

                
                   //Validaciones
        $rules =array(              
                            'phone'             => 'required|int',                      
                            'price'             =>  'required|int',
                            'details'           => 'required',
                            'registrationNumber'=> 'required,'
                              
                          );
        $this->validate($request,$rules);

           
           
            //Divide date de acuerdo al limitador -
            $date= explode('-', $animal->birthdate);
            //get date and get age.
            $date= Carbon::createFromDate($date[0],$date[1],$date[2])->age;
           


            $sale_animal= new SaleAnimal();
            $sale_animal->idUser=Auth::id(); 
            $sale_animal->idFarm=Session::get('farm');       
            $sale_animal->image=$animal->image;
            $sale_animal->name=$animal->name;
            $sale_animal->slug=$animal->slug;
            $sale_animal->age=$date;
            $sale_animal->breed=$animal->breed;
            $sale_animal->gender=$animal->gender;
            $sale_animal->registrationNumber=$animal->registrationNumber; 
            $sale_animal->farm=$farm->name;
            $sale_animal->feature=$animal->feature;
            $sale_animal->price=$request->price;
            $sale_animal->seller_name=$user->name;
            $sale_animal->phone=$request->phone;
            $sale_animal->email=$user->email;
            $sale_animal->details=$request->details;
            $sale_animal->address=$user->address;

            $sale_animal->save();

            $animal->status=1;
            $animal->save();

              //operador ternario
            $message = $sale_animal ? 'Animal agregado correctamente a venta!' : 'El Animal NO pudo agregarse!';
            
            return redirect()->route('animal-index')->with('message', $message);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       $animal=Animal::where('slug',$slug)->first();
       $user= User::where('id',Auth::id())->first();

       if($animal->status==0)
       {
        return view('animal.create_sale',compact('animal','user'));
       }

        $message = 'Animal ya esta en  venta!';
            
        return redirect()->route('animal-index')->with('message', $message);      

        
        
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
