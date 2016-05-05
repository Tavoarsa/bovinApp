@extends('layouts.farm')
@section('content')

    <div class="container text-center">
    	<div class="page-header">
    		 <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar Fincas</h1>	
    	</div>
    	<div class="table-cart">
    		@if(count($farms))
    		
    		<div class="table-responsive">
	    		<table class="table table-striped table-hover table-bordered">
	    			<head>
	    				<tr>	    					
	    					<th>Nombre</th>	    					
	    					<th>Certificado</th>
	    					<th>Explotación</th>
	    					<th>Editar</th>
	    					<th>Quitar</th>
	    				</tr>
	    			</head>
	    			<tbody>
	    				@foreach($farms as $farm)
	    					<tr>	    						
	    						<td>{{$farm->name}}</td>	    						
	    						<td>{{$farm->operationCertificate}}</td>
	    						<td>{{$farm->exploitation}}</td>	    						
	    						<td>
                                    <a href="#" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>   						
	    						<td>
	    							<a href="#" class="btn btn-danger">
	    								<i class="fa fa-remove"></i>
	    							</a>
	    						</td>
	    					</tr>
	    				@endforeach
	    			</tbody>	    			
	    		</table><hr>
	    		
	    	</div>
	    	@else
	    		<h3><span class="label label-warning">Noy hay Fincas</span></h3>
	    	@endif
	    	<hr>
	    	<p>
	    		<a class="btn btn-primary" href="#"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>


	    		
	    	</p>
    	</div>
       
    </div>
    



@stop