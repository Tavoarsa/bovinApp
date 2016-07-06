@extends('layouts.farm')
@section('content')
<div class="container text-center">
   <div class="page-header">
			<h1>
				<i class="fa fa-pencil-square-o"></i>
				Alimentos<small>[Editar Alimento]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::model($aliment, array('route' => array('aliment.update', $aliment->id))) !!}
                    
                        <input type="hidden" name="_method" value="PUT">                    
                        
        
                        
                        
                        <div class="form-group">
                            <label for="alimentName">Alimento:</label>
                            
                             {!! Form::select('alimentName', array('Concetrado' => 'Concetrado', 'Silo' => 'Silo','Sal' => 'Sal'), 'Sal',["class" => "form-control"])!!}
                        </div>
                        
                       
                     
                         <div class="form-group">
                            <label for="dateApplication">Fecha De aplicación</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="dateApplication">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>


                         <div class="form-group">
                            <label for="dose">Dosis:</label>
                            
                            {!! 
                                Form::text(
                                    'dose', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la dosis aplicada...',
                                        'autofocus' => 'autofocus',
                                        'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                         <div class="form-group">
                            <label for="responsible">Responsable:</label>
                            
                            {!! 
                                Form::text(
                                    'responsible', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre del responsable...',
                                        'autofocus' => 'autofocus',
                                        'required' => 'required'
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