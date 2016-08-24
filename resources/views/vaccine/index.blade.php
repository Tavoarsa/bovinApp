@extends('layouts.farm')
@section('content')

    <div class="container text-center">
    	<div class="page-header">
    		 <h1><i class="fa fa-info-circle" aria-hidden="true"></i>Vacunas</h1>

    		 <h1>				
			<a href="{{url('vaccine/create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Aplicar Vacuna</a>            
			</h1>	
    	</div>
    	<div class="table-cart">
    		@if(count($vaccines))
    		
    		<div class="table-responsive">
	    		<table class="table table-striped table-hover table-bordered">
	    			<head>
	    				<tr>
	    					<th>Editar</th>	    					
	    					<th>Enfermedad</th>	    					
	    					<th>Vacuna</th>
	    					<th>Dosis</th>
	    					<th>Fecha<br>Aplicada</th>
	    					<th>Proxima<br>Aplicación</th>
	    					<th>Valor</th>
	    					<th>Responsable</th>
	    					
	    					
	    				</tr>
	    			</head>
	    			<tbody>
	    				@foreach($vaccines as $vaccine)
	    					<tr>
	    						<td>
                                    <a href="{{ route('vaccine.edit', $vaccine->id) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>	    						
	    						<td>{{$vaccine->diseaseName}}</td>	    						
	    						<td>{{$vaccine->vaccineName}}</td>
	    						<td>{{$vaccine->dose}}</td>
	    						<td>{{$vaccine->dateApplication}}</td>
	    						<td>{{$vaccine->boosterInjection}}</td>
	    						<td> ¢ {{$vaccine->value}}</td> 
	    						<td>{{$vaccine->responsible}}</td>   						
	    						   						
	    						
	    					</tr>
	    				@endforeach
	    			</tbody>	    			
	    		</table><hr>
	    		
	    	</div>
	    	@else
	    		<h3><span class="label label-warning">Noy hay Ninguna Vacuna aplicada</span></h3>
	    	@endif
	    	<hr>
	    	<p>
	    		<a class="btn btn-primary" href="{{route('dashboard-animal',$slug)}}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>	    		
	    	</p>
    	</div>
       
    </div>
    



@stop