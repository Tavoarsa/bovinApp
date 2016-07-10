@extends('layouts.farm')
@section('content')
<div class="container text-center">
   <div class="page-header">
			<h1>
				<i class="fa fa-pencil-square-o"></i>
				REGISTRO REPRODUCTIVO<small>[Editar Registro]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::model($reproduction, array('route' => array('reproduction.update', $reproduction->id))) !!}
                    
                        <input type="hidden" name="_method" value="PUT">                    
                        
        
                        <div class="form-group">
                            <label for="heat_date">Fecha de Celo:</label>                            
                            {!! Form::text('heat_date', null, array("class" => "date")) !!}
                        </div>

                        <div class="form-group">
                            <label for="fertilization">Tipo de fecundación:</label>
                             {!! Form::select('fertilization', array('FI' => 'FI', 'IA' => 'IA','TE' => 'TE','MT' => 'MT'),["class" => "form-control"])!!}
                        </div>
                        <div class="form-group">
                            <label for="likely_date">Fecha aproximada de parto :</label>
                           {!! Form::text('likely_date', null, array("class" => "date")) !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="palpation_date">Fecha de palpación:</label>                            
                            {!! Form::text('palpation_date', null, array("class" => "date")) !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="parturition">Tipo de parto:</label>
                            
                            {!! 
                                Form::text(
                                    'parturition', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el tipo de parto.',
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="gender_calf">Sexo del becerro:</label>
                            
                            {!! 
                                Form::text(
                                    'gender_calf', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el sexo del becerro..',
                                    )
                                ) 
                            !!}
                        </div>

                         <div class="form-group">
                            <label for="interval_parturition">Intervalo entre partos:</label>
                            
                            {!! 
                                Form::text(
                                    'interval_parturition', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Intervalo entre partos',
                                    )
                                ) 
                            !!}
                        </div>

                         <div class="form-group">
                            <label for="abortion_date">Fecha de Aborto:</label>
                            
                          {!! Form::text('abortion_date', null, array("class" => "date")) !!}
                        </div> 
                         <div class="form-group">
                            <label for="months_gestation">Meses de gestación:</label>
                            
                            {!! 
                                Form::text(
                                    'months_gestation', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Meses degestación',
                                    )
                                ) 
                            !!}
                        </div>

                         <div class="form-group">
                            <label for="open_period">Periodo Abierto:</label>
                            
                            {!! 
                                Form::text(
                                    'open_period', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Periodo Abierto.',
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