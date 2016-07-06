@extends('layouts.farm')
@section('content')

    <div class="container text-center">
    	<div class="page-header">
    		 <h1><i class="fa fa-info-circle" aria-hidden="true"></i>Inyección</h1>

    		 <h1>				
			<a href="{{url('injecction/create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Aplicar Inyección</a>            
			</h1>	
    	</div>
    	<div class="table-cart">
    		@if(count($injecctions))
    		
    		<div class="table-responsive">
	    		<table class="table table-striped table-hover table-bordered">
	    			<head>
	    				<tr>
	    					<th>Editar</th>	    					
	    					<th>Enfermedad</th>	    					
	    					<th>Vacuna</th>
	    					<th>Fecha<br>Aplicada</th>
	    					<th>Proxima<br>Aplicación</th>
	    					<th>Responsable</th>
	    					
	    					
	    				</tr>
	    			</head>
	    			<tbody>
	    				@foreach($injecctions as $injecction)
	    					<tr>
	    						<td>
                                    <a href="{{ route('injecction.edit', $injecction->id) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>	    						
	    						<td>{{$injecction->diseaseName}}</td>	    						
	    						<td>{{$injecction->injecctionName}}</td>
	    						<td>{{$injecction->dateApplication}}</td>
	    						<td>{{$injecction->boosterInjection}}</td>
	    						<td>{{$injecction->responsible}}</td>   						
	    						   						
	    						
	    					</tr>
	    				@endforeach
	    			</tbody>	    			
	    		</table><hr>
	    		
	    	</div>
	    	@else
	    		<h3><span class="label label-warning">Noy hay Ninguna Inyeccionaplicada</span></h3>
	    	@endif
	    	<hr>
	    	<p>
	    		<a class="btn btn-primary" href="{{route('dashboard-animal',$slug)}}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>
	    		


	    		
	    	</p>
    	</div>
       
    </div>
    



@stop