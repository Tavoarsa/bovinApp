    @extends('layouts.admin')

@section('content')
<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-pencil"></i>
				PRODUCTOS <small>[Editar producto]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::model($badamecum, array('route' => array('admin.badamecum.update', $badamecum->slug),'files' => true)) !!}
                    
                        <input type="hidden" name="_method" value="PUT">
                    
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

                        <div class="controls">
                                {!!Form::label('image', 'Foto')!!}
                               <br/>
                                <img class="img-index" src="/img/badamecum/{{$badamecum->image}}"></td>
                                
                                <input id="files" type="file" name="image" />
                                <br/>
                                <output class="img-index" id="list"></output> 
                                                            
                        </div> 
                        
                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.badamecum.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>   

	</div>

     <script src="{{ asset('/js/create-badamecum.js') }}"></script>

@stop