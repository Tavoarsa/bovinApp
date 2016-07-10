@extends('layouts.farm')
@section('content')
<div class="container text-center">
   <div class="page-header">
			<h1>
				<i class="fa fa-pencil-square-o"></i>
				REGISTRO DE PESO<small>[Editar Registro]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::model($weight, array('route' => array('weight.update', $weight->id))) !!}
                    
                        <input type="hidden" name="_method" value="PUT">                    
                        
        
                        <div class="form-group">
                            <label for="date">Fecha:</label>                            
                            {!! Form::text('date', null, array("class" => "date")) !!}
                        </div>

                        <div class="form-group">
                            <label for="weight">Peso:</label>
                            
                            {!! 
                                Form::text(
                                    'weight', 
                                    null, 
                                    array(
                                        'class'=>'form-control',                                       
                                        'autofocus' => 'autofocus',
                                        'placeholder' => 'Ingresa el peso...'
                                    )
                                ) 
                            !!}
                        </div>                        
                      
                
                        
                        
                        
                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('farm-index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
</div>


@stop