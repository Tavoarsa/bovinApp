@extends('layouts.admin')

@section('content')

<div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-plus"></i>
                PRODUCTOS VETERINARIOS<small>[Agregar producto]</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::open(['route'=>'admin.badamecum.store','files' => true]) !!}
                    
                        <div class="form-group">
                            <label class="control-label" for="category_id">Categoría</label>
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                        </div>
        
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            
                            {!! 
                                Form::text(
                                    'name', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="extract">Extracto:</label>
                            
                            {!! 
                                Form::text(
                                    'extract', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el extracto...',
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Descripción:</label>
                            
                            {!! 
                                Form::textarea(
                                    'description', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la descripción...',
                                    )
                                ) 
                            !!}
                        </div>

                         <div class="form-group">
                            <label for="indications">Indicaciones:</label>
                            
                            {!! 
                                Form::text(
                                    'indications', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa las indicaciones...',
                                    )
                                ) 
                            !!}
                        </div>

                          <div class="form-group">
                            <label for="active_ingredients">Ingrediente Activo:</label>
                             
                            {!! 
                                Form::text(
                                    'active_ingredients', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el ingrediente activo...',
                                    )
                                ) 
                            !!}
                        </div>

                          <div class="form-group">
                            <label for="presentation">Presentación:</label>
                            
                            {!! 
                                Form::select(
                                'presentation', 
                                array(
                                'litro' => 'Litro', 'bolsa' => 'Bolsa'), 'Litro',["class" => "form-control"])!!}
                        </div>

                          <div class="form-group">
                            <label for="retirement">Tiempo de Retiro:</label>
                            
                            {!! 
                                Form::textarea(
                                    'retirement', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el  tiempo de retiro para leche o carne...',
                                    )
                                ) 
                            !!}
                        </div>

                         <div class="form-group">
                            <label for="size">Tamaño:</label>
                            
                            {!! 
                                Form::text(
                                    'size', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el tamaño o el peso del producto...',
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Precio:</label>

                            <input type="number" name="price"  placeholder="Ingresa el precio..." required="required" >
                           
                        </div>
                       <div class="controls">
                                {!!Form::label('image', 'Foto')!!}
                                
                                <input id="files" type="file" name="image" />
                                <br />
                                <output  class="img-index" id="list"></output> 
                                                            
                             </div>
                             <hr>

                             

                        
                        <div class="form-group">
                            <label for="visible">Visible:</label>
                            
                            {!! 
                                Form::checkbox(
                                    'visible', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.product.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
        

    </div>

    <script src="{{ asset('/js/create-badamecum.js') }}"></script>

@stop