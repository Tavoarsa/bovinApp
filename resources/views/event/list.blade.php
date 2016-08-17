@extends('layouts.calendar')

@section('content')

@include('event.partials.menu_calendar') 

<div class="row">
	<div class="col-md-offset-3 col-md-6">
		@if($events->count() > 0)
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Detalle del Evento</th>
					<th>Inicio</th>
					<th>Fin</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php $i = 1;?>
			@foreach($events as $event)
				<tr>
					<th scope="row">{{ $i++ }}</th>
					<td><a href="{{ url('events/' . $event->id) }}">{{ $event->title }}</a></td>
					<td>{{ date("g:ia\, jS M Y", strtotime($event->start_time)) }}</td>
					<td>{{date("g:ia\, jS M Y", strtotime($event->end_time)) }}</td>
					<td>
						<a class="btn btn-primary btn-xs" href="{{ url('events/' . $event->id . '/edit')}}">
							<span class="glyphicon glyphicon-edit"></span> Editar</a>
					</td>
					<td>

						<form action="{{ url('events/' . $event->id) }}" style="display:inline" method="POST">
							<input type="hidden" name="_method" value="DELETE" />
							{{ csrf_field() }}
							<button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
						</form>
					</td> 
						
					
				</tr>
			@endforeach
			</tbody>
		</table>
		@else
			<h2>Aún no hay eventos Registrados</h2>
		@endif
	</div>
</div>
@endsection
