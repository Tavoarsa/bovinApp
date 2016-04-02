@extends('layouts.main')
@section('content')

<div class="content-section-a">
    <div class="container">
        <div class="row">
      
                    {!! Form::open() !!}
 
                            <div class="form-group">

                                {!!Form::label('name', 'Nombre')!!}
                                {!! Form::text('name', null, ["class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">

                                {!!Form::label('address', 'Dirección')!!}
                                {!! Form::text('address', null, ["class" => "form-control"]) !!}
                            </div>


                            <div class="form-group">

                                {!!Form::label('agent', 'Representante')!!}
                                {!! Form::text('agent', null, ["class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">

                                {!!Form::label('operationCertificate', 'Certificado Operacion')!!}
                                {!! Form::text('operationCertificate', null, array("class" => "form-control", 'placeholder' => 'Numero generado por SENASA')) !!}
                            </div>

                            <div class="form-group">

                                {!!Form::label('exploitation', 'Explotacion')!!}
                                {!! Form::select('exploitation', array('carne' => 'Carne', 'leche' => 'Leche','doblePrposito' => 'Doble Proposito'), 'Leche')!!}
                            </div>

                            
                            <div class="controls">
                                {!!Form::label('patent', 'Fierro')!!}
                                 <input type="file" name="patent" required>                             
                             </div>
 
                            
                            <div class="form-group">
                                {!! Form::submit('Guardar', ["class" => "btn btn-success btn-block"]) !!}
                            </div>
                             
 
                    {!! Form::close() !!}
        </div>
    </div>
</div>


@stop