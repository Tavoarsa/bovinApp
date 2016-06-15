@extends('layouts.farm')

@section('content')

<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				PRODUCTOS VETERINARIOS<small>[Agregar producto]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::open(['route'=>'Veterinary.badamecum.store']) !!}
                    
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
                                        'class'=>'form-control'
                                    )
                                ) 
                            !!}
                        </div>

                         <div class="form-group">
                            <label for="price">Indicaciones:</label>
                            
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
                            <label for="price">Ingrediente Activo:</label>
                            
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
                            <label for="price">Presentación:</label>
                            
                            {!! 
                                Form::select(
                                'presentation', 
                                array(
                                'litro' => 'Litro', 'bolsa' => 'Bolsa'), 'Litro',["class" => "form-control"])!!}
                        </div>

                          <div class="form-group">
                            <label for="price">Tiempo de Retiro:</label>
                            
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
                            <label for="price">Tamaño:</label>
                            
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
                            
                            {!! 
                                Form::text(
                                    'price', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el precio...',
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="controls">
                                {!!Form::label('image', 'Foto')!!}
                                
                                <input id="files_badamecum" type="file" name="image" required />
                                <br />
                                <output id="list_badamecum"></output> 
                                                            
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

@stop