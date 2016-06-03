@extends('layouts.farm')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i>CONTROL ANIMAL</h1>
        </div>
        
        <h2> {{ $animal->name}}</h2><a href="{{ route('animal.edit', $animal->slug) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i> Editar</a> <hr>
     
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-user icon-home"></i>
                     <a href="{{url('#') }}"  class="btn btn-warning btn-block btn-home-admin">VACUNAS</a> 
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="#" class="btn btn-warning btn-block btn-home-admin">INYECCIONES</a>
                </div>
            </div>

             <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="#" class="btn btn-warning btn-block btn-home-admin">ALIMENTACIÓN</a>
                </div>
            </div>

              <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="#" class="btn btn-warning btn-block btn-home-admin">PESO</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="#" class="btn btn-warning btn-block btn-home-admin">PRODUCCIÓN LECHERA</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="#" class="btn btn-warning btn-block btn-home-admin">REGISTRO DE CELOS</a>
                </div>
            </div>                     
        </div>
        <hr>
         <p>
         <a class="btn btn-primary"  href="{{url('animal/') }}""><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>          
    </p>
                  
    </div>
    <hr>

   

@stop