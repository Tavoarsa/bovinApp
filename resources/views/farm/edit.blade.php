@extends('layouts.farm')
@section('content')
<div class="container text-center">
   <div class="page-header">
			<h1>
				<i class="fa fa-pencil-square-o"></i>
				FINCAS <small>[Editar finca]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::model($farm, array('route' => array('farm.update', $farm->id))) !!}
                    
                        <input type="hidden" name="_method" value="PUT">                    
                        
        
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
                        </div>agent

                        <div class="form-group">
                            <label for="extract">Representante:</label>
                            
                            {!! 
                                Form::text(
                                    'agent', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre del representante...',
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="extract">Certificado:</label>
                            
                            {!! 
                                Form::text(
                                    'operationCertificate', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el numero de certificado...',
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Explotación:</label>
                            
                            {!! 
                                Form::text(
                                    'exploitation', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                         'placeholder' => 'Ingresa el tipo de explotación de la finca ..',
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Dirección:</label>
                            
                            {!! 
                                Form::text(
                                    'address', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la dirección...',
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Imagen:</label>
                            
                            {!! 
                                Form::text(
                                    'patent', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la url de la imagen...',
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