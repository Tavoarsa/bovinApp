@extends('layouts.farm')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i>CONTROL ANIMAL</h1>
        </div>
        
        <h2> {{ $animal->name}}</h2><a href="{{ route('animal.edit', $animal->slug) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i> Editar</a> <hr>
        <div>
         <div hidden class="form-group">
                              {!!Form::text('fiv',"fiv") !!}
                                
        </div>
            
        </div>
        <input type="hidden" name="_method" value="$animal->id">   
     
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-ambulance" aria-hidden="true"></i>
                     <a href="{{url('vaccine') }}"  class="btn btn-warning btn-block btn-home-admin">VACUNAS</a> 
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-ambulance" aria-hidden="true"></i>
                    <a href="{{url('injecction') }}" class="btn btn-warning btn-block btn-home-admin">INYECCIONES</a>
                </div>
            </div>

             <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a  href="{{url('aliment') }}" class="btn btn-warning btn-block btn-home-admin">ALIMENTACIÓN</a>
                </div>
            </div>

              <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{route('weight-index')}}" class="btn btn-warning btn-block btn-home-admin">PESO</a>
                </div>
            </div>

            @if($animal->gender=='hembra')

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{route('production-index')}}" class="btn btn-warning btn-block btn-home-admin">PRODUCCIÓN LECHERA</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{route('reproduction-index')}}" class="btn btn-warning btn-block btn-home-admin">REGISTRO REPRODUCTIVO</a>
                </div>
            </div>

            @endif

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{route('create-sale',$animal->slug)}}" class="btn btn-warning btn-block btn-home-admin">VENTA</a>
                </div>
            </div>

             <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-cc-paypal  icon-home"></i>
                    <a <a href="{{route('dashboard-report')}}" class="btn btn-warning btn-block btn-home-admin">REPORTES</a>
                </div>
            </div>  

             <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-cc-paypal  icon-home"></i>
                    <a <a href="{{route('profitability',$animal->slug)}}" class="btn btn-warning btn-block btn-home-admin">RENTABILIDAD</a>
                </div>
            </div> 

             <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-cc-paypal  icon-home"></i>
                    <a <a href="" class="btn btn-warning btn-block btn-home-admin">EXPEDIENTE</a>
                </div>
            </div>                     
        </div>
        <hr>
         <p>
         <a class="btn btn-primary"  href="{{url('animal/') }}"<i class="fa fa-chevron-circle-left"></i>REGRESAR</a>          
    </p>
                  
    </div>
    <hr>

   

@stop