@extends('layouts.calendar')

@section('content')

@include('event.partials.menu_calendar') 

@include('event.message')

<div class="row">
	<div class="col-md-offset-3 col-md-6">
		
		<form action="{{ url('events') }}" method="POST">
			{{ csrf_field() }}

			<div class="form-group @if($errors->has('name')) has-error has-feedback @endif">
				<label for="name">Nombre del Evento</label>
				<input type="text" class="form-control" name="name" placeholder="Ej:Vacunación" value="{{ old('name') }}">
				@if ($errors->has('name'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('name') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
				<label for="title">Detalle del Evento</label>
				<input type="text" class="form-control" name="title" placeholder="Ej: Vacunación preventivo Pierna Negra" value="{{ old('title') }}">
				@if ($errors->has('title'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('title') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('time')) has-error @endif">
				<label for="time">Fecha</label>
				<div class="input-group">
					<input type="text" class="form-control" name="time" placeholder="Select your time" value="{{ old('time') }}">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
                    </span>
				</div>
				@if ($errors->has('time'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('time') }}
					</p>
				@endif
			</div>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</form>		
	</div>
</div>
@endsection

@section('js')

<script type="text/javascript">

$(function () {
	$('input[name="time"]').daterangepicker({
		"minDate": moment('<?php echo date('Y-m-d G')?>'),
		"timePicker": true,
		"timePicker24Hour": true,
		"timePickerIncrement": 15,
		"autoApply": true,
		"locale": {
			"format": "DD/MM/YYYY",
			"separator": " - ",
		}
	});
});
</script>
@endsection