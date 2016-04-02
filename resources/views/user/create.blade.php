@extends('layouts.admin')
@section('content')

<div class="content-section-a">
    <div class="container">
        <div class="row">

        	{!! Form::open(['route'=>'user.store','method'=>'POST']) !!}

                <div class="form-group">
                    {!!Form::label('name', 'Nombre:')!!}
                    {!!Form::text('name', null, ["class" => "form-control",'placeholder'=>'Ingrese el nombre de usuario']) !!}
                 </div>
                 <div class="form-group">
                    {!!Form::label('email', 'Correo:')!!}
                    {!!Form::text('email', null, ["class" => "form-control",'placeholder'=>'Ingrese un correo valido']) !!}
                 </div>
                  <div class="form-group">
                    {!!Form::label('password', 'Contraseña:')!!}
                    {!!Form::password('password', ["class" => "form-control",'placeholder'=>'Ingrese una contraseña']) !!}
                 </div>
                 <div class="form-group">
                    {!! Form::submit('Registrarse', ["class" => "btn btn-success btn-block"]) !!}
                 </div>
            {!! Form::close() !!}
			
		</div>
	</div>
</div>
@stop