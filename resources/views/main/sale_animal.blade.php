@extends('layouts.main')
@section('content')
<div class="container text-center">
        <div class="page-header">
            <h1>                
            <a href="{{ route('animal-create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Agregar</a>            
            </h1>
        </div>
        <div class="page">
            @if(count($sales))
                <div class="row">
                    @foreach($sales as $sale)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">                                      
                                <a href="#">
                                    <img src="/img/animal/{{$sale->image}}" alt="{{$sale->name}}">
                                </a>                                
                            <div class="caption">                                        
                                <h3 >{{$sale->name}}</h3>
                                <h4 >Raza: {{$sale->breed}}</h4>
                                <h2 >Precio: $ {{$sale->price}}</h2>
                                
                            </div>
                            </div>
                            <p>
                            
                            <a class="btn btn-primary" href="{{route('info_sale',$sale->slug)}}"><i class="fa fa-chevron-circle-right"></i>INFORMACIÓN</a>
                        </p>
                        </div>
                    @endforeach                           
                </div>
                <?php echo $sales->render(); ?>
            @else
            <h3><span class="label label-warning">Noy hay Ningún animal en venta</span></h3>
            @endif
            <hr>
            <p>
                <a class="btn btn-primary" href={{route('home')}}><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>          
            </p><hr>
                   
       </div>

</div>





@stop