@extends('layouts.farm')
@section('content')

<div class="content-section-a">
    <div class="container" text-center>
        <div class="page-header">
            <h1><i class="fa fa-info"></i>Detalle de la venta</h1>            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="product-block">
                 <img src="/img/animal/{{$sale->image}}" alt="{{$sale->name}}"  width="300">   
            </div>
             <h3>{{$sale->name}}</h3><hr>
                    @if($sale->age==0)
                        <p>Edad:Menos de una año</p><hr>
                    @else
                        <p>Edad: {{$sale->age}} años</p><hr>
                     @endif
                        <p>Registro de Animal: {{$sale->registrationNumber}}</p><hr>
                        <p>Sexo: {{$sale->gender}}</p><hr>
                        <p>Raza: {{$sale->breed}}</p><hr>
                        <p>Raza: {{$sale->price}}</p><hr>
                   
                        
                
            </div>
            <div align="center" class="col-md-6">
                <div class="product-block">
                    <h3>Precio: ${{$sale->price}}</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Comentarios</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td></td>                           
                                   
                                    
                            </tr>
                            
                        </tbody>
                    </table>
                </div>                                    
                        <p>
                            <a class="btn btn-primary" href="{{route('animal-index')}}"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
                            <a class="btn btn-warning" href="{{route('end-sale',$sale->slug)}}"><i class="fa fa-chevron-circle-left"></i> Terminar Venta</a>
                        </p>
                    </div>
                </div>                
            </div>        	
        </div>
    </div>
</div>


@stop

