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
                    
                    {!! Form::model($farm, array('route' => array('farm.update', $farm->id),'files' => true)) !!}
                    
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
                        </div>

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
                            <label for="exploitation">Tipo Explotación:</label>
                            
                            {!! Form::select('exploitation',array(
                                        'Carne' => 'Carne', 
                                        'Leche' => 'Leche',
                                        'Doble Proposito' => 'Doble Proposito'
                                        ), 
                                     $farm->exploitation
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


                         <div class="controls">
                                {!!Form::label('patent', 'Foto')!!}
                                <hr>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail">                                      
                                            <a >
                                                <img src="/img/farm/{{$farm->patent}}" alt="{{$farm->name}}">
                                             </a>                               
                                           
                                        </div>
                                    </div><hr>                             
                                
                                <input id="files" type="file" name="image" />
                                <br>
                                <output id="list"></output> 
                                                            
                             </div>
                            <hr>
                        
                     
                        
                        
                        
                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('farm-info') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
</div>

<script src="{{ asset('/js/preview_editFarm.js') }}"></script>


@stop