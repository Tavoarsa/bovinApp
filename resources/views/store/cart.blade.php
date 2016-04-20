@extends('layouts.store')
@section('content')

    <div class="container text-center">
    	<div class="page-header">
    		 <h1><i class="fa fa-shopping-cart"></i>Carrito de compras</h1>	
    	</div>
    	<div class="table-cart">
    		@if(count($cart))
    		<p>
    			<a href="{{route('cart-trash')}}" class="btn btn-danger">
    				Vacia Carro<i class="fa fa-trash"></i>    				
    			</a>
    		</p>
	    	<div class="table-responsive">
	    		<table class="table table-striped table-hover table-bordered">
	    			<head>
	    				<tr>
	    					<th>Imagen</th>
	    					<th>Producto</th>
	    					<th>Precio</th>
	    					<th>Cantidad</th>
	    					<th>Subtotal</th>
	    					<th>Quitar</th>
	    				</tr>
	    			</head>
	    			<tbody>
	    				@foreach($cart as $item)
	    					<tr>
	    						<td><img src="{{$item->image}}"></td>
	    						<td>{{$item->name}}</td>
	    						<td>{{number_format($item->price,2)}}</td>
	    						<td>
	    							<input 
	    								type="number"
	    								min="1"
	    								max="100"
	    								value="{{ $item->quantity}}"
	    								id="product_{{ $item->id }}"
	    							>
	    							<a 
	    									    								
	    							>
	    								<i class="fa fa-refresh"></i>
	    							</a>
	    						</td>
	    						<td>{{number_format($item->price * $item->quantity,2)}}</td>
	    						<td>
	    							<a href="{{route('cart-delete',$item->slug)}}" class="btn btn-danger">
	    								<i class="fa fa-remove"></i>
	    							</a>
	    						</td>
	    					</tr>
	    				@endforeach
	    			</tbody>	    			
	    		</table><hr>
	    		<h3><span class="label label-success">
	    			Total:${{number_format($total,2)}}
	    		</span></h3>
	    	</div>
	    	@else
	    		<h3><span class="label label-warning">Noy hay productos en el Carro</span></h3>
	    	@endif
	    	<hr>
	    	<p>
	    		<a class="btn btn-primary" href="{{route('store')}}"><i class="fa fa-chevron-circle-left"></i> Seguir comprando</a>


	    		<a class="btn btn-primary" href="{{route('store')}}"><i class="fa fa-chevron-circle-right"></i> Continuar</a>
	    	</p>
    	</div>
       
    </div>
    



@stop