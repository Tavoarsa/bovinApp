<?php

namespace BovinApp\Http\Controllers\Admin;

use Illuminate\Http\Request;

use BovinApp\Http\Requests;
use BovinApp\Http\Controllers\Controller;
use BovinApp\Category;

class CategoryCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        return view('admin.category.index', compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
          'name' => 'required|unique:categories|max:255'
        ]);
        
        $category = Category::create([
            'name' => $request->get('name'),
            'slug' => str_slug($request->get('name')),
            'description' => $request->get('description')
            
        ]);
        //operador ternario
        $message = $category ? 'Categoría agregada correctamente!' : 'La Categoría NO pudo agregarse!';
        
        return redirect()->route('admin.category.index')->with('message', $message);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
          'name' => 'required|max:255',
         
        ]);
        //fill:cambia todos los valores de acuerdo al formulario.
        $category->fill($request->all());
        $category->slug = str_slug($request->get('name'));
        
        $updated = $category->save();
        
        $message = $updated ? 'Categoría actualizada correctamente!' : 'La Categoría NO pudo actualizarse!';
        
        return redirect()->route('admin.category.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $deleted = $category->delete();
        
        $message = $deleted ? 'Categoría eliminada correctamente!' : 'La Categoría NO pudo eliminarse!';
        
        return redirect()->route('admin.category.index')->with('message', $message);
    }
}
