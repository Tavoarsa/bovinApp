@extends('layouts.main')
@section('content')
<div class="content-section-a">
    <div class="container" text-center>
        <div class="page-header">
            <h1><i class="fa fa-info-circle"></i>Detalle de la Finca</h1>            
        </div>
        <div class="row">
          @foreach($farms as $farm)
            <div class="col-md-6">
                <div class="product-block">
                <img src="/img/farm/{{$farm->patent}}" width="300">
                  <p>Certificado de Operación: {{$farm->operationCertificate}}</p>    
            </div>
                
            </div>
            <div class="col-md-6">
                <div class="product-block">
              
                    <h3>{{$farm->name}}</h3><hr>
                    <div class="product-info">
                        <p>Se ubica en: {{$farm->address}}</p>
                        <p>Tipo de explotación de la finca: {{$farm->exploitation}}</p>                          
                        <p>                 
                            <a class="btn btn-primary" href="{{route('search')}}"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
                        </p>
                    </div>
                
                </div>                
            </div> 
           @endforeach       	
        </div>
    </div>
</div>

@stop