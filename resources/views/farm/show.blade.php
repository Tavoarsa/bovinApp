@extends('layouts.farm')
@section('content')

    <div class="container text-center">
    	<div class="page-header">
    		 <h1><i class="fa fa-info-circle" aria-hidden="true"></i>Fincas</h1>

    		 <h1>				
			<a href="{{ route('farm-create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Agregar</a>            
			</h1>	
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

                                    <a href="{{ route('farm.edit', $farm->slug) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>   						
	    						 <td>
                                    {!! Form::open(['route' => ['farm.destroy', $farm->id]]) !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    {!! Form::close() !!}
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
	    		<a class="btn btn-primary" href="{{ route('dashboard-farm',$farm->slug) }}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>	
	    	</p>
    	</div>
       
    </div>
    



@stop