@extends('layouts.farm')

@section('content')


<div class="container text-center">


		<div class="page-header">			
            <h1>
                ANIMALES<small>[ Agregar Animal]</small>
            </h1>        
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">               

                    <div class="btn-group btn-group-justified">

                      <a type="button" value="Mostrar" onclick="mt()" class="btn btn-primary">Monta Natural</a>
                      <a type="button" value="Mostrar" onclick="te()" class="btn btn-primary">Embriones</a>
                      <a type="button" value="Mostrar" onclick="fi()"class="btn btn-primary">In Vitro</a>
                      <a type="button" value="Mostrar" onclick="ia()" class="btn btn-primary">Artificial</a>
                    </div><hr>
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif

                    <div id="hidden-mt">

                        <div>
                            {!! Form::open(
                                 array(
                                    'route' => 'animal.store', 
                                    'class' => 'form', 
                                    'novalidate' => 'novalidate', 
                                    'files' => true)) !!}

                             <div hidden class="form-group">
                              {!!Form::text('mt',"mt") !!}
                                
                             </div>

                              <div hidden class="form-group">
                              {!!Form::text('status',"0") !!}
                                
                             </div>
                                
                            <div class="form-group">
                                {!!Form::label('name', 'Nombre Animal')!!}
                                {!!Form::text('name', null, ["class" => "form-control"]) !!}
                            </div>
                            
                            <div  id="mother" class="form-group">
                                {!!Form::label('mother', 'Madre')!!}
                                {!!Form::text('mother', null, ["class" => "form-control"]) !!}
                            </div>

                            <div  id="father" class="form-group">
                                {!!Form::label('father', 'Padre')!!}
                                {!!Form::text('father', null, ["class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('breed', 'Raza')!!}
                                {!! Form::select('breed', array('holsten' => 'Holsten', 'yersey' => 'Yersey','guir' => 'Guir'), 'Holtein',["class" => "form-control"])!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('gender', 'Genero')!!}
                                {!! Form::select('gender', array('hembra' => 'Hembra', 'macho' => 'Macho'), 'Hembra',["class" => "form-control"])!!}
                            </div>
                            
                         <div class="form-group">
                            <label for="birthdate">Fecha De Nacimiento</label>
                            <div class="input-group">
                                {!! Form::text('date', null, array("class" => "date")) !!}
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

                                <a href="{{url('animal/') }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i>Regresar</a>                    
                                <a href="javascript:location.reload()" class="btn btn-primary" >Cambiar</a>                     
                                {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}

                            </div>
 
                            
                            {!! Form::close() !!}
                            
                        </div>               
                
                    </div>

                     <div id="hidden-te">

                        <div>
                            {!! Form::open(
                                 array(
                                    'route' => 'animal.store', 
                                    'class' => 'form', 
                                    'novalidate' => 'novalidate', 
                                    'files' => true)) !!}

                            <div hidden class="form-group">
                              {!!Form::text('te',"te") !!}
                                
                             </div>    

                             <div hidden class="form-group">
                              {!!Form::text('status',"1") !!}
                                
                             </div>

                            <div class="form-group">
                                {!!Form::label('name', 'Nombre Animal')!!}
                                {!!Form::text('name', null, ["class" => "form-control"]) !!}
                            </div>

                            <div  id="father" class="form-group">
                                {!!Form::label('father', 'Padre')!!}
                                {!!Form::text('father', null, ["class" => "form-control"]) !!}
                            </div>

                            
                            <div  id="donorMother" class="form-group">
                                {!!Form::label('donorMother', 'Madre Donadora')!!}
                                {!!Form::text('donorMother', null, ["class" => "form-control"]) !!}
                            </div>

                            <div  id="receivingMother" class="form-group">
                                {!!Form::label('receivingMother', 'Madre Receptora')!!}
                                {!!Form::text('receivingMother', null, ["class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('breed', 'Raza')!!}
                                {!! Form::select('breed', array('holsten' => 'Holsten', 'yersey' => 'Yersey','guir' => 'Guir','braman' => 'Braman','pardo' => 'Pardo','lenor' => 'Lenor','guense' => 'Guense'), 'Holstein',["class" => "form-control"])!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('gender', 'Genero')!!}
                                {!! Form::select('gender', array('hembra' => 'Hembra', 'macho' => 'Macho'), 'Hembra',["class" => "form-control"])!!}
                            </div>
                            
                             <div class="form-group">
                                <label for="birthdate">Fecha Nacimiento</label>
                                <div class="input-group">
                                    {!! Form::text('date', null, array("class" => "date")) !!}
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
                                
                                <input id="files_te" type="file" name="image" required />
                                <br />
                                <output id="list_te"></output> 
                                                            
                             </div>
                             <hr>
                            
                            <div class="form-group">
                                <a href="{{url('animal/') }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i>Regresar</a>                    
                                <a href="javascript:location.reload()" class="btn btn-primary" >Cambiar</a>                     
                                {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            </div>
                            
                            {!! Form::close() !!}
                            
                        </div>                 
                    </div>

                    <div id="hidden-fi">

                        <div>
                            {!! Form::open(
                                 array(
                                    'route' => 'animal.store', 
                                    'class' => 'form', 
                                    'novalidate' => 'novalidate', 
                                    'files' => true)) !!}

                             <div hidden class="form-group">
                              {!!Form::text('fi',"fi") !!}
                                
                             </div>

                             <div hidden class="form-group">
                              {!!Form::text('status',"2") !!}
                                
                             </div>

                            <div class="form-group">
                                {!!Form::label('name', 'Nombre Animal')!!}
                                {!!Form::text('name', null, ["class" => "form-control"]) !!}
                            </div>

                            <div  id="father" class="form-group">
                                {!!Form::label('father', 'Padre')!!}
                                {!!Form::text('father', null, ["class" => "form-control"]) !!}
                            </div>

                            
                            <div  id="donorMother" class="form-group">
                                {!!Form::label('donorMother', 'Madre Donadora')!!}
                                {!!Form::text('donorMother', null, ["class" => "form-control"]) !!}
                            </div>

                            <div  id="receivingMother" class="form-group">
                                {!!Form::label('receivingMother', 'Madre Receptora')!!}
                                {!!Form::text('receivingMother', null, ["class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('breed', 'Raza')!!}
                                {!! Form::select('breed', array('holsten' => 'Holsten', 'yersey' => 'Yersey','guir' => 'Guir'), 'Holtein',["class" => "form-control"])!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('gender', 'Genero')!!}
                                {!! Form::select('gender', array('hembra' => 'Hembra', 'macho' => 'Macho'), 'Hembra',["class" => "form-control"])!!}
                            </div>
                            
                             <div class="form-group">
                                <label for="birthdate">Fecha Nacimiento</label>
                                <div class="input-group">
                                   {!! Form::text('date', null, array("class" => "date")) !!}
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
                                
                                <input id="files_fi" type="file" name="image" required />
                                <br />
                                <output id="list_fi"></output> 
                                                            
                             </div>
                             <hr>             
                            <div class="form-group">
                                <a href="{{url('animal/') }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i>Regresar</a>                    
                                <a href="javascript:location.reload()" class="btn btn-primary" >Cambiar</a>                     
                                {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            </div>
                          
                            
                            {!! Form::close() !!}
                            
                        </div>                 
                    </div>

                     <div id="hidden-ia">

                        <div>
                            {!! Form::open(
                                 array(
                                    'route' => 'animal.store', 
                                    'class' => 'form', 
                                    'novalidate' => 'novalidate', 
                                    'files' => true)) !!}

                             <div hidden class="form-group">
                              {!!Form::text('ia',"ia") !!}
                                
                             </div>

                             <div hidden class="form-group">
                              {!!Form::text('status',"3") !!}
                                
                             </div>

                            <div class="form-group">
                                {!!Form::label('name', 'Nombre Animal')!!}
                                {!!Form::text('name', null, ["class" => "form-control"]) !!}
                            </div>
                            
                            <div  id="mother" class="form-group">
                                {!!Form::label('mother', 'Madre')!!}
                                {!!Form::text('mother', null, ["class" => "form-control"]) !!}
                            </div>

                            <div  id="father" class="form-group">
                                {!!Form::label('father', 'Padre')!!}
                                {!!Form::text('father', null, ["class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('breed', 'Raza')!!}
                                {!! Form::select('breed', array('holsten' => 'Holsten', 'yersey' => 'Yersey','guir' => 'Guir'), 'Holtein',["class" => "form-control"])!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('gender', 'Genero')!!}
                                {!! Form::select('gender', array('hembra' => 'Hembra', 'macho' => 'Macho'), 'Hembra',["class" => "form-control"])!!}
                            </div>
                            
                           <div class="form-group">
                                <label for="birthdate">Fecha Nacimiento</label>
                                <div class="input-group">
                                  
                                   {!! Form::text('date', null, array("class" => "date")) !!}
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
                                <input id="files_ia" type="file" name="image" required />
                                <br />
                                <output id="list_ia"></output>                                                          
                             </div>
                             <hr> 
                            
                            <div class="form-group">
                                <a href="{{url('animal/') }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i>Regresar</a>                    
                                <a href="javascript:location.reload()" class="btn btn-primary" >Cambiar</a>                     
                                {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            </div>                          
                            
                            {!! Form::close() !!}
                            
                        </div>                 
                    </div>
            </div>
        </div>       

	</div>
</div>

@stop








