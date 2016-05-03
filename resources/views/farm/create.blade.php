@extends('layouts.farm')

@section('content')

<div class="container text-center">
		<div class="page-header">			
            <h1>
                FINCAS<small>[ Agregar Finca]</small>
            </h1>        
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::open(['route'=>'farm.store']) !!}
                    
                         <div class="form-group">
                            <label for="name">Nombre:</label>
                            
                            {!! 
                                Form::text(
                                    'name', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre de la finca...',
                                        'autofocus' => 'autofocus',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Dirección:</label>
                            
                            {!! 
                                Form::text(
                                    'address', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la dirección...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="agent">Representante:</label>
                            
                            {!! 
                                Form::text(
                                    'agent', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre del representate...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="operationCertificate">Certicado de operación:</label>
                            
                            {!! 
                                Form::text(
                                    'operationCertificate', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el Certificado brindado por Senasa...',
                                        //'required' => 'required'
                                    )
                                ) 
                            !!}
                        </div>                        
                           
                        <div class="form-group">
                            <label for="exploitation">Explotación:</label>
                            
                            {!! Form::select(
                                    'exploitation', 
                                     array(
                                        'carne' => 'Carne', 
                                        'leche' => 'Leche',
                                        'doblePrposito' => 'Doble Proposito'
                                        ), 
                                     'Leche'
                                     )
                            !!}
                        </div>

                        <div class="controls">
                                {!!Form::label('patent', 'Fierro')!!}
                                 <input type="file" name="patent" >                             
                        </div>
                       
                        
                        <div class="form-group">
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('farm.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
        

	</div>

@stop