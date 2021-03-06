@extends('layouts.farm')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i>MI FINCA- DASHBOARD</h1>
        </div>
        
        <h2>Bienvenido(a) {{ Auth::user()->user }} </h2><hr>
     
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-user icon-home"></i>
                     <a href="{{url('animal/') }}"  class="btn btn-warning btn-block btn-home-admin">ANIMAL</a> 
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="{{route('farm-info') }}" class="btn btn-warning btn-block btn-home-admin">FINCAS</a>
                </div>
            </div>

          

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{ route('report-animals_mastitis') }}" class="btn btn-warning btn-block btn-home-admin" download>MASTITIS</a>
                </div>
            </div>

          

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="{{ route('badamecum-farm') }}" class="btn btn-warning btn-block btn-home-admin">VADAMECUM</a>
                </div>
            </div>

             <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    <a href="#" class="btn btn-warning btn-block btn-home-admin">ESTADISTICAS</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <a href="{{url('calendar/') }}" class="btn btn-warning btn-block btn-home-admin">CALENDARIO</a>
                </div>
            </div> 
                    
        </div>
        
        
           
            
           
            <p>
                <a class="btn btn-primary" href="{{ route('farm-index') }}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>   
            </p>           
        
        
    </div>

    <hr>

@stop