@extends('layouts.main')
@section('content')

 <div class="container text-center">
  <!--Buscador-->
        {!!Form::open(['route'=>'search','method'=>'GET','class'=>'navbar-form  navbar-right'])!!}
        <div class="input-group">
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar Fincas','aria-describedby'=>'search'])!!}
        </div>
        
        
       
        {!!Form::close()!!}    
        <!--Fin--> 

    <div class="page-header">    
       <h1><i class="fa fa-search"></i>Rastreabilidad</h1>                    
    </div>

    <div >    

         @if(count($farms))
           
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <head>
                        <tr>                                                    
                            <th>Certificado</th>
                            <th>Nombre</th>                           
                            <th>Ver mas</th>
                        </tr>
                    </head>
                    <tbody>
                        @foreach($farms as $item)
                            <tr>                                                             
                                <td>{{$item->operationCertificate}}</td>
                                <td>{{$item->name}}</td>
                              
                                <td>
                                    <a href="{{route('info-farm',$item->id)}}" class="btn btn-danger">
                                        <i class="fa fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>                    
                </table><hr>
             
            </div>

            @else
                <p>La trazabilidad o rastreabilidad, como componente fundamental de los mecanismos de garantía sanitaria, es la capacidad de mantener identificados los animales o sus productos, a lo largo de las cadenas de producción, comercialización y transformación hasta su origen, con el fin de realizar investigaciones epidemiológicas o establecer acciones correctivas en beneficio de la comunidad consumidora.</p>
            @endif
            <hr>
            <p>
                <a class="btn btn-primary" href="{{route('search')}}"><i class="fa fa-undo"></i>Limpiar Busquedad</a>

                <a class="btn btn-primary" href="{{route('home')}}"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
            </p>
            <hr>
        </div>       
   
</div>


@stop