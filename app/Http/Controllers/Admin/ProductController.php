<?php

namespace BovinApp\Http\Controllers\Admin;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use BovinApp\Http\Requests\SaveProductRequest;
use BovinApp\Http\Controllers\Controller;

use BovinApp\Product;
use BovinApp\Category;
use Input;

class ProductCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(3);
        return view('admin.product.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->lists('name', 'id');
        //dd($categories);
        return view('admin.product.create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

              //Validaciones
        $rules =array(              
                        'name'          => 'required',
                        'description'   => 'required',
                        'extract'       => 'required',
                        'price'         => 'required|integer',                        
                        'category_id'   => 'required' 
                      );
        $this->validate($request,$rules);

        $product= new Product();

        $product->name = $request->get('name');
        $product->slug = str_slug($request->get('name'));
        $product->description=$request->get('description');
        $product->extract=$request->get('extract');
        $product->price=$request->get('price');
        $product->visible=$request->has('visible') ? 1 : 0;
        $product->category_id= $request->category_id;
        

            //Validacion de imagen 
        if (Input::hasFile('image')) 
        {   
            $file = Input::file('image');//Creamos una instancia de la libreria instalada
            $image = \Image::make(\Input::file('image'));//Ruta donde queremos guardar las imagenes

            $path = 'img/product/';

            // Cambiar de tamaño
            $image -> resize(331, 152);
            $image -> save($path . $file -> getClientOriginalName());   
            $product->image = $file -> getClientOriginalName();
            //$animal->save(); 
            //return redirect() -> route('animal.index');
         }else
         {
            //Si no hay imagen, se guarda una por defecto
            $image='product';  
            $default = 'product.jpg';
            $product->image = $default;              
            //$animal->save();
         }

        $product = $product->save();
        $message = $product ? 'Producto agregado correctamente!' : 'El producto NO pudo agregarse!';
        
        return redirect()->route('admin.product.index')->with('message', $message);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Product $product)
    {

        return $product;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Product $product)
    {

        $categories = Category::orderBy('id', 'desc')->lists('name', 'id');

        return view('admin.product.edit', compact('categories', 'product'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SaveProductRequest $request, Product $product)
    {
        $product->fill($request->all());

        $product->slug = str_slug($request->get('name'));

        $product->visible = $request->has('visible') ? 1 : 0;


           //Validacion de imagen 
        if (Input::hasFile('image')) 
        {   
            $file = Input::file('image');//Creamos una instancia de la libreria instalada
            $image = \Image::make(\Input::file('image'));//Ruta donde queremos guardar las imagenes

            $path = 'img/product/';

            // Cambiar de tamaño
            $image -> resize(331, 152);
            $image -> save($path . $file -> getClientOriginalName());   
            $product->image = $file -> getClientOriginalName();
            //$animal->save(); 
            //return redirect() -> route('animal.index');
         }else
         {
            //Si no hay imagen, se guarda una por defecto
            $image='product';  
            $default = 'product.jpg';
            $product->image = $default;              
            //$animal->save();
         }



        
        $updated = $product->save();
        
        $message = $updated ? 'Producto actualizado correctamente!' : 'El Producto NO pudo actualizarse!';
        
        return redirect()->route('admin.product.index')->with('message', $message);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Product $product)
    {
        $deleted = $product->delete();
        
        $message = $deleted ? 'Producto eliminado correctamente!' : 'El producto NO pudo eliminarse!';
        
        return redirect()->route('admin.product.index')->with('message', $message);
    }
}
