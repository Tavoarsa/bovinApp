@extends('layouts.farm')
@section('content')

<div class="content-section-a">
    <div class="container" text-center>
        <div class="page-header">
            <h1><i class="fa fa-info-circle"></i>Detalle del Animal</h1>            
        </div>
       


        <div id="main" class="row">
          
            <div  class="col-md-offset-3 col-md-6">
                 @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::model($animal, array('route' => array('animal.update', $animal))) !!}

                    
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

                            <div align="center" class="form-group">
                                {!!Form::label('breed', 'Raza')!!}
                                {!! Form::select('breed', array('holsten' => 'Holsten', 'yersey' => 'Yersey','guir' => 'Guir'))!!}
                            </div>

                            <div align="center" class="form-group">
                                {!!Form::label('gender', 'Genero')!!}
                                {!! Form::select('gender', ['hembra' => 'Hembra', 'macho' => 'Macho'])!!}
                            </div>
                            
                       
                             <div align="center" class="form-group">
                                <label for="birthdate">Fecha De Nacimiento</label>
                                <div class="input-group">
                                    {!! Form::text('birthdate', null, array("class" => "date")) !!}
                                    
                                </div>
                            </div>
                                   <div align="center" class="form-group">
                                <label for="deathdate">Fecha De Muerte</label>
                                <div class="input-group">
                                    {!! Form::text('deathdate', null, array("class" => "date")) !!}
                                    
                                </div>
                            </div>





                            <div class="form-group">
                                {!!Form::label('feature', 'Caracteristicas')!!}
                                {!! Form::text('feature', null, array("class" => "form-control", 'placeholder' => 'Observaciones')) !!}
                            </div>

                             <div class="controls">
                                {!!Form::label('image', 'Foto')!!}

                                <hr>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail">                                      
                                            <a >
                                                <img src="/img/animal/{{$animal->image}}" >
                                             </a>                               
                                           
                                        </div>
                                    </div><hr>  
                                
                               <input id="files" type="file" name="image" />
                                <br>
                                <output id="list"></output>  
                                                            
                             </div>
                             <hr>              
                
                        
                        
                        
                        <div align="center" class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('animal-index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                
            </div>
            


                     
        </div>
    </div>
</div>

<script src="{{ asset('/js/preview_editAnimal.js') }}"></script>









@stop