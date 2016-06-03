@extends('layouts.farm')
@section('content')

<div class="content-section-a">
    <div class="container" text-center>
        <div class="page-header">
            <h1><i class="fa fa-info-circle"></i>Detalle del Animal</h1>            
        </div>
        <div class="row">
          
            <div class="col-md-6">
                 @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::model($animal, array('route' => array('animal.update', $animal->slug))) !!}
                    
                        <input type="hidden" name="_method" value="PUT">                    
                        
        
                       <div class="form-group">
                                {!!Form::label('name', 'Nombre Animal')!!}
                                {!!Form::text('name', null, ["class" => "form-control"]) !!}
                            </div>
                            
                            <div  id="animalNumber" class="form-group">
                                {!!Form::label('animalNumber', 'Numero Animal')!!}
                                {!!Form::text('animalNumber', null, ["class" => "form-control"]) !!}
                            </div>

                            <div  id="registrationNumber" class="form-group">
                                {!!Form::label('registrationNumber', 'Número Registro')!!}
                                {!!Form::text('registrationNumber', null, ["class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('breed', 'Raza')!!}
                                {!! Form::select('breed', array('holsten' => 'Holsten', 'yersey' => 'Yersey','guir' => 'Guir'))!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('gender', 'Genero')!!}
                                {!! Form::select('gender', array('hembra' => 'Hembra', 'macho' => 'Macho'))!!}
                            </div>
                            
                         <div class="form-group">
                            <label for="birthdate">Fecha De Nacimiento</label>
                            <div class="input-group">
                                <input  type="text" class="form-control datepicker" name="birthdate">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div> 
                        

                            <div class="form-group">
                                {!!Form::label('feature', 'Caracteristicas')!!}
                                {!! Form::text('feature', null, array("class" => "form-control", 'placeholder' => 'Observaciones')) !!}
                            </div>

                             <div class="controls">
                                {!!Form::label('image', 'Foto')!!}
                                
                                <input id="files_mt" type="file" name="image" required />
                                <br />
                                <output id="list_mt"></output> 
                                                            
                             </div>
                             <hr>              
                
                        
                        
                        
                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('animal-index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                
            </div>
            <div class="col-md-6">
                <div class="product-block">
              
                     <h1><i class="fa fa-info-circle"></i>Detalle del Origin del Animal</h1>            
                
                </div>                
            </div>           
        </div>
    </div>
</div>






@stop