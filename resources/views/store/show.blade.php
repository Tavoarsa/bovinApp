@extends('layouts.store')
@section('content')

<div class="content-section-a">
    <div class="container" text-center>
        <div class="page-header">
            <h1><i class="fa fa-shopping-cart"></i>Detalle del producto</h1>            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="product-block">
                <img src="{{$product->image}}" width="300"> 
            </div>
                
            </div>
            <div class="col-md-6">
                <div class="product-block">
                    <h3>{{$product->name}}</h3><hr>
                    <div class="product-info">
                        <p>{{$product->description}}</p>
                        <p>Precio: ${{number_format($product->price,2)}}</p>
                        <p>
                            
                            <a class="btn btn-warning"href="{{ route('cart-add',$product->slug)}}"><i class="fa fa-cart-plus"></i> Comprar</a>
                            <a class="btn btn-primary" href="{{route('store')}}"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
                        </p>
                    </div>
                </div>                
            </div>        	
        </div>
    </div>
</div>


@stop

