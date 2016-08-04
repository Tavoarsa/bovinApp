<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Evento</h2>

<div>
		<div class="table-responsive">
	    		<table class="table table-striped table-hover table-bordered">
	    			<head>
	    				<tr>
	    					<th>Editar</th>	    					
	    					
	    					
	    					
	    				</tr>
	    			</head>
	    			<tbody>
	    				@foreach($events as $event)
	    					<tr>
	    						
                                </td>	    						
	    						<td>{{$event->end_time}}</td>	    						
	    						  						
	    						   						
	    						
	    					</tr>
	    				@endforeach
	    			</tbody>	    			
	    		</table><hr>
	    		
	    	</div>
	
</div>






</body>
</html>