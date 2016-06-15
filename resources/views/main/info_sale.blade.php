@extends('layouts.main')
@section('content')

<div class="content-section-a">
    <div class="container" text-center>
        <div class="page-header">
            <h1><i class="fa fa-info"></i>Detalle de la Venta</h1>            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="sale-image">
                    <img src="/img/animal/{{$sale->image}}" alt="{{$sale->name}}"  width="300">  
                </div>
                <h3>{{$sale->name}}</h3><hr>
                 @if($sale->age==0)
                        <p>Edad:Menos de una año</p><hr>
                    @else
                        <p>Edad: {{$sale->age}} años</p><hr>
                     @endif
                <p>Registro de sale: {{$sale->registrationNumber}}</p><hr>
                <p>Sexo: {{$sale->gender}}</p><hr>
                <p>Raza: {{$sale->breed}}</p><hr>
                
            </div>
            <div class="col-md-6">
                <div class="product-block">                            
                    
                    <div class="product-info">
                        <h3><i class="fa fa-user-secret" aria-hidden="true"></i>Información del Vendedor</h3>
                        <h3>Nombre del vendedor: {{$sale->seller_name}}</h3><hr>
                            <p>Correo: {{$sale->email}}</p><hr>
                            <p>Dirección: {{$sale->address}}</p><hr>
                            <p>Telefono: {{$sale->phone}}</p><hr>                       
                        
                        
                    </div>
                    <hr>
            <p>
                <a class="btn btn-primary" href="{{route('sale-animal')}}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>          
            </p><hr>

                   
                </div>                
            </div>        	
        </div>
    </div>
</div>


@stop