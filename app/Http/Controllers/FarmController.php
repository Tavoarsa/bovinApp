<?php

namespace BovinApp\Http\Controllers;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use BovinApp\Http\Requests\SaveFarmRequest;
use BovinApp\Farm;

use Auth;
use Input;
use Session;



class FarmCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    
    {
        $farms = Farm::where('idUser',Auth::id())
                -> paginate(3);

        return view('farm.index', compact('farms'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("farm.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_farm=Session::get('farm');        
      
        $rules =array
            (
                'name'                  => 'required',  
                'agent'                 => 'required',
                'operationCertificate'  => 'required',          
                'address'               => 'required'
            );

        $this->validate($request,$rules);    

        $farm = new \BovinApp\Farm($request->all());

        $id_users= Auth::id(); 
        $farm->idUser = $id_users;
        $farm->slug= str_slug($request->get('name'));

        $message = $farm ? 'Finca agregada correctamente!' : 'La finca NO pudo agregarse!'; 

        if(Input::hasFile('image')){    

            $file = Input::file('image');//Creamos una instancia de la libreria instalada

            $patent = \Image::make(\Input::file('image'));//Ruta donde queremos guardar las imagenes
            $path = 'img/farm/';          
                // Cambiar de tamaño
            $patent -> resize(358, 141);
            $patent -> save($path . $file -> getClientOriginalName());  
            $farm->patent = $file -> getClientOriginalName();;
            $farm->save();


            return redirect() -> route('farm-index')->with('message', $message);
        }
        $default ='farm.jpg';
        $farm->patent = $default;
        //dd($farm->patent);
        
        $farm->save();
        return redirect() -> route('farm-index'); 
            
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $farms = Farm::where('idUser',Auth::id())-> get();
        return view('farm.show', compact('farms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $slug)
    {
     
        $farm = Farm::where('idUser',Auth::id())
                        ->where('slug',$slug)
                        ->first();
        return view('farm.edit', compact('farm'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
        

        $farm->fill($request->all());
        $farm->slug = str_slug($request->get('name'));

       
        if(Input::hasFile('image')){    

            $file = Input::file('image');//Creamos una instancia de la libreria instalada

            $patent = \Image::make(\Input::file('image'));//Ruta donde queremos guardar las imagenes
            $path = 'img/farm/';          
                // Cambiar de tamaño
            $patent -> resize(358, 141);
            $patent -> save($path . $file -> getClientOriginalName());  
            $farm->patent = $file -> getClientOriginalName();;
            $farm->save();


           // return redirect() -> route('farm-index')->with('message', $message);
        }

        $default =$farm->patent;
        $farm->patent = $default;
       
        
        $farm->save();
        
      
                
        $updated = $farm->save();
        
        $message = $updated ? 'Finca actualizado correctamente!' : 'La fincaNO pudo actualizarse!';
        
        return redirect()->route('dashboard-farm',$farm->slug)->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farm=Farm::find($id);
        $farm->delete();       
        $message = 'Producto eliminado correctamente!';        
        return redirect()->route('farm-info')->with('message', $message);
    }
}
