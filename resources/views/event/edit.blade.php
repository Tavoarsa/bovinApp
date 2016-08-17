@extends('layouts.calendar')

@section('content')

@include('event.partials.menu_calendar') 

<div class="row">
	<div class="col-md-offset-3 col-md-6">
		
		@if($errors)
			@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
			@endforeach
		@endif
		
		<form action="{{ url('events/' . $event->id) }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT" />
			<div class="form-group @if($errors->has('name')) has-error has-feedback @endif">
				<label for="name">Nombre del Evento</label>
				<input type="text" class="form-control" name="name" value="{{ $event->name }}" placeholder="Ej:Vacunación">
				@if ($errors->has('name'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('name') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('title')) has-error has-feedback @endif">
				<label for="title">Detalle del Evento</label>
				<input type="text" class="form-control" name="title" value="{{ $event->title }}" placeholder="Ej: Vacunación preventivo Pierna Negra">
				@if ($errors->has('title'))
					<p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span> 
					{{ $errors->first('title') }}
					</p>
				@endif
			</div>
			<div class="form-group @if($errors->has('time')) has-error @endif">
				<label for="time">Fecha</label>
				<div class="input-group">
					<input type="text" class="form-control" name="time" value="{{ $event->start_time . ' - ' . $event->end_time }}" placeholder="Select your time">
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
			<button type="submit" class="btn btn-primary">Actualizar</button>
		</form>		
	</div>
</div>
@endsection

@section('js')

<script type="text/javascript">
$(function () {
	$('input[name="time"]').daterangepicker({
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