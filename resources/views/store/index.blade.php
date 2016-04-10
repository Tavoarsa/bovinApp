@extends('layouts.main')
@section('content')

<div class="content-section-a">
    <div class="container">
        <div class="row">
         	<div class= "products">
         		<div class="product">
         			@foreach($products as $product)
	            	<h3>{{$product->name}}</h3>
	            	<img src="{{$product->image}}" width="250">
	            	<div class="product-info">
	            		<p>{{$product->extract}}</p>
	            		<p>Precio: ${{number_format($product->price,2)}}</p>
	            		<p>
	            			<a href="#">Comprar</a>
	            			<a href="{{route('product-detail',$product->slug)}}">Leer mas</a>
	            		</p>	            		
	            	</div>
	            @endforeach         			
         		</div>            		

         	</div>
            

        </div>
    </div>
</div>


@stop