@extends('layouts.calendar')

@section('content')

 @include('event.partials.menu_calendar') 

<div class="row">
	<div class="col-md-offset-3 col-md-6">
		<h2>{{ $event->name }} <small>Realizado por {{ Auth::user()->user }}</small></h2>
		<hr>
	</div>
</div>

<div class="row">
	<div class="col-md-offset-3 col-md-6">

		<h2>{{ $event->title }}</h2>
		<hr>
		<p>Fecha de ejecución <br>
		{{ date("g:ia\, jS M Y", strtotime($event->start_time)) . ' until ' . date("g:ia\, jS M Y", strtotime($event->end_time)) }}
		</p>
		
		
		
		<p>
			<form action="{{ url('events/' . $event->id) }}" style="display:inline;" method="POST">
				<input type="hidden" name="_method" value="DELETE" />
				{{ csrf_field() }}
				<button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
			</form>
			<a class="btn btn-primary" href="{{ url('events/' . $event->id . '/edit')}}">
				<span class="glyphicon glyphicon-edit"></span> Editar</a> 
			
		</p>
		
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
			"format": "DD/MM/YYYY HH:mm:ss",
			"separator": " - ",
		}
	});
});
</script>
@endsection