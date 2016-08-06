<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Bienvenido al sistema de notificación automatica de BovinApp.com</h2><hr>
<h3>A continuación se mostrara los eventos que estan pedientes de ejecutar</h3>

<div>
		<div class="table-responsive">
	    		<table class="table table-striped table-hover table-bordered">
	    			<head>
	    				<tr>
	    					<th>Fecha que se debe<br>ejecutar el evento</th>
	    					<th>Nombre del evento <br>que se debe ejecutar</th>		    					
	    				</tr>
	    			</head>
	    			<tbody>
	    				@foreach($events as $event)
	    					<tr>                               	    						
	    						<td>{{$event->end_time}}</td>
	    						<td>{{$event->title}}</td>	    							    						
	    					</tr>
	    				@endforeach
	    			</tbody>	    			
	    		</table><hr>
	    		
	    	</div>
	
</div>

<h2>Si los eventos ya se ejecutaron, se debe eliminar de la lista de eventos pendientes.</h2>

<h4>http://bovinapp.herokuapp.com/</h4> 






</body>
</html>