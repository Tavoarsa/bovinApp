<?php

namespace BovinApp\Http\Controllers\Admin;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use BovinApp\Http\Controllers\Controller;

use BovinApp\Badamecum;
use BovinApp\Category;
use Input;

class BadamecumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $badamecums = Badamecum::orderBy('id', 'desc')->paginate(6);
        return view('admin.badamecum.index', compact('badamecums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->lists('name', 'id');
         return view('admin.badamecum.create', compact('categories'));
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
                        'name'               => 'required',                       
                        'description'        => 'required',                      
                        'extract'            => 'required',
                        'indications'        => 'required',
                        'active_ingredients' => 'required',
                        'presentation'       => 'required',
                        'retirement'         => 'required',
                        'size'            	 => 'required|int',
                        'price'            	 => 'required',                        
                        'category_id'  		 => 'required'           
                      );
        $this->validate($request,$rules);


        $badamecum = new Badamecum();
        $badamecum->name=$request->name;
        $badamecum->slug=str_slug($request->get('name'));
        $badamecum->description=$request->description;
        $badamecum->extract=$request->extract;
        $badamecum->indications=$request->indications;
        $badamecum->active_ingredients=$request->active_ingredients; 
        $badamecum->presentation=$request->presentation;
        $badamecum->retirement=$request->retirement;
        $badamecum->size=$request->size;
        $badamecum->price=$request->price;
        $badamecum->visible= $request->has('visible') ? 1 : 0;
        $badamecum->category_id=$request->category_id;

            //Validacion de imagen 
        if (Input::hasFile('imagen')) 
        {   
            $file = Input::file('imagen');//Creamos una instancia de la libreria instalada
            $image = \Image::make(\Input::file('imagen'));//Ruta donde queremos guardar las imagenes

            $path = 'img/badamecum/';

            // Cambiar de tamaño
            $image -> resize(331, 152);
            $image -> save($path . $file -> getClientOriginalName());   
            $badamecum->image = $file -> getClientOriginalName();
            //$badamecum->save(); 
            //return redirect() -> route('badamecum.index');
         }else
         {
            //Si no hay imagen, se guarda una por defecto
            $image='badamecum';  
            $default = 'badamecum.jpg';
            $badamecum->image = $default;              
            //$badamecum->save();
         }

         $badamecum->save();
         

          //operador ternario
        $message = $badamecum ? 'Producto agregado correctamente!' : 'El Producto NO pudo agregarse!';
        
        return redirect()->route('admin.badamecum.index')->with('message', $message);
    }

    public function show(Badamecum $badamecum)
    {
        return $badamecum;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Badamecum $badamecum)
    {

        $categories = Category::orderBy('id', 'desc')->lists('name', 'id');
        return view('admin.badamecum.edit', compact('categories', 'badamecum'));
    }

    public function update(Badamecum $badamecum, Request $request)
	{


		//BovinApp\Badamecum::where('slug',$slug)->first();

		$animal = Badamecum::findOrFail($badamecum->id);
		//Validaciones
		$rules =array(				
																									
			'name'               => 'required',                       
            'description'        => 'required',                      
            'extract'            => 'required',
            'indications'        => 'required',
            'active_ingredients' => 'required',
            'presentation'       => 'required',
            'retirement'         => 'required',
            'size'            	 => 'required|int',
            'price'            	 => 'required',                        
            'category_id'  		 => 'required'				
					  );
		$this->validate($request,$rules);
		

		$badamecum->name=$request->name;
        $badamecum->slug=str_slug($request->get('name'));
        $badamecum->description=$request->description;
        $badamecum->extract=$request->extract;
        $badamecum->indications=$request->indications;
        $badamecum->active_ingredients=$request->active_ingredients; 
        $badamecum->presentation=$request->presentation;
        $badamecum->retirement=$request->retirement;
        $badamecum->size=$request->size;
        $badamecum->price=$request->price;
        $badamecum->visible= $request->has('visible') ? 1 : 0;
        $badamecum->category_id=$request->category_id;
	
        
            //Validacion de imagen 
        if (Input::hasFile('imagen')) 
        {   
            $file = Input::file('imagen');//Creamos una instancia de la libreria instalada
            $image = \Image::make(\Input::file('imagen'));//Ruta donde queremos guardar las imagenes

            $path = 'img/badamecum/';

            // Cambiar de tamaño
            $image -> resize(331, 152);
            $image -> save($path . $file -> getClientOriginalName());   
            $badamecum->image = $file -> getClientOriginalName();
            //$badamecum->save(); 
            //return redirect() -> route('badamecum.index');
         }else
         {
            //Si no hay imagen, se guarda una por defecto
            $image='badamecum';  
            $default = 'badamecum.jpg';
            $badamecum->image = $default;              
            //$badamecum->save();
         }

         $badamecum->save();
     	  //operador ternario
        $message = $badamecum ? 'Producto actualizado correctamente!' : 'El Producto NO pudo actualizarce!';
        
        return redirect()->route('admin.badamecum.index')->with('message', $message);
    }

     public function destroy(Badamecum $badamecum)
    {
        $deleted = $badamecum->delete();
        
        $message = $deleted ? 'Producto eliminado correctamente!' : 'El producto NO pudo eliminarse!';
        
        return redirect()->route('admin.badamecum.index')->with('message', $message);
    }


}
