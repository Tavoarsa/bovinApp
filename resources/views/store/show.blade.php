@extends('layouts.main')
@section('content')

<div class="content-section-a">
    <div class="container">
        <div class="row">
        	<h1>Detalle del product</h1>

        	<div class="product-block">
        		<img src="{{$product->image}}" width="300">	
        	</div>
        	<div class="product-block">
        		<h3>{{$product->name}}</h3><hr>
        		<div class="product-info">
        			<p>{{$product->description}}</p>
        			<p>Precio: ${{number_format($product->price,2)}}</p>
        			<p>
        				<a href="#">Comprar</a>
        			</p>
        		</div>
        	</div>
        	<p><a href="{{route('store')}}">Regresar</a></p>
        	


        </div>
    </div>
</div>


@stop

