@extends('layouts.farm')
@section('content')

    <div class="container text-center">
    	<div class="page-header">
    		 <h1><i class="fa fa-info-circle" aria-hidden="true"></i>Alimento</h1>

    		 <h1>				
			<a href="{{url('aliment/create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Aplicar Alimento</a>            
			</h1>	
    	</div>
    	<div class="table-cart">
    		@if(count($aliments))
    		
    		<div class="table-responsive">
	    		<table class="table table-striped table-hover table-bordered">
	    			<head>
	    				<tr>
	    					<th>Editar</th>
	    					<th>Alimento</th>	    					
	    					<th>Fecha<br>Aplicada</th>
	    					<th>Dosis</th>
	    					<th>Valor</th>	    					
	    					<th>Responsable</th>
	    					
	    					
	    				</tr>
	    			</head>
	    			<tbody>
	    				@foreach($aliments as $aliment)
	    					<tr>
	    						<td>
                                    <a href="{{ route('aliment.edit', $aliment->id) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>	    						
	    						    						
	    						<td>{{$aliment->alimentName}}</td>
	    						<td>{{$aliment->dateApplication}}</td>
	    						<td>{{$aliment->dose}}</td>
	    						<td>{{$aliment->value}}</td>	    						
	    						<td>{{$aliment->responsible}}</td>   						
	    						   						
	    						
	    					</tr>
	    				@endforeach
	    			</tbody>	    			
	    		</table><hr>
	    		
	    	</div>
	    	@else
	    		<h3><span class="label label-warning">Noy hay Ninguna Alimento Aplicado</span></h3>
	    	@endif
	    	<hr>
	    	<p>
	    		<a class="btn btn-primary" href="{{route('dashboard-animal',$slug)}}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>
	    		


	    		
	    	</p>
    	</div>
       
    </div>
    



@stop