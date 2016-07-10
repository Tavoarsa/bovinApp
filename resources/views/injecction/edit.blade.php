@extends('layouts.farm')
@section('content')
<div class="container text-center">
   <div class="page-header">
			<h1>
				<i class="fa fa-pencil-square-o"></i>
				Inyecciónes<small>[Editar Inyección]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::model($injecction, array('route' => array('injecction.update', $injecction->id))) !!}
                    
                        <input type="hidden" name="_method" value="PUT">                    
                        
        
                           
                         <div class="form-group">
                            <label for="diseaseName">Enfermedad:</label>
                            
                            {!! Form::select('diseaseName', array('piernaNegra' => 'Pierna Negra', 'mastitis' => 'Mastitis','brucelosis' => 'Brucelosis'), 'Brucelosis',["class" => "form-control"])!!}
                        </div>
                        
                        <div class="form-group">
                            <label for="injecctionName">Inyección:</label>
                            
                            {!! Form::select('injecction', $badamecums,$injecction->injecctionName,["class" => "form-control"])!!}

                              <a href="#"><i class="fa fa-info"   aria-hidden="true"></i>Detalle</a> 
                        </div>
                        
                       
                     
                         <div class="form-group">
                            <label for="dateApplication">Fecha De aplicación</label>
                            <div class="input-group">
                           {!! Form::text('dateApplication', null, array("class" => "date")) !!}
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="boosterInjection">Fecha proxima aplicación</label>
                            <div class="input-group">
                                {!! Form::text('boosterInjection', null, array("class" => "date")) !!}
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