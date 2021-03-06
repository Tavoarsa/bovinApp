@extends('layouts.farm')
@section('content')

<div class="content-section-a">
    <div class="container" text-center>
        <div class="page-header">
            <h1><i class="fa fa-info"></i>Detalle del producto</h1>            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="product-block">
                 <img src="/img/badamecum/{{$badamecum->image}}" alt="{{$badamecum->name}}"  width="300">  
            </div>
                
            </div>
            <div class="col-md-6">
                <div class="product-block">
                    <h3>{{$badamecum->name}}</h3><hr>
                    <div class="product-info">
                        <p>{{$badamecum->description}}</p>
                        <p>Precio: ${{number_format($badamecum->price,2)}}</p>
                        <p>
                            
                            
                            <a class="btn btn-primary" href="{{route('badamecum-farm')}}"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
                        </p>
                    </div>
                </div>                
            </div>        	
        </div>
    </div>
</div>


@stop

