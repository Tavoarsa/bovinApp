@extends('layouts.farm')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i>REPORTES</h1>
        </div>
        
       
     
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-user icon-home"></i>
                     <a href="{{route('report-vaccine')}}"  class="btn btn-warning btn-block btn-home-admin"  download>VACUNAS</a> 
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-user icon-home"></i>
                     <a href="{{route('report-injecction')}}"  class="btn btn-warning btn-block btn-home-admin" download>INJECCIONES</a> 
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="{{route('report-veterinary')}}" class="btn btn-warning btn-block btn-home-admin" download>REGISTRO CLINICO</a>
                </div>
            </div>

             <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a  href="{{route('report-production')}}" class="btn btn-warning btn-block btn-home-admin" download>PRODUCCIÓN LECHERA</a>
                </div>
            </div>

              <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{route('report-weight')}}" class="btn btn-warning btn-block btn-home-admin" download>PESO</a>
                </div>
            </div>

          

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{route('report-reproduction')}}" class="btn btn-warning btn-block btn-home-admin" download>REPRODUCCIÓN</a>
                </div>
            </div>

          

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{route('report-production_mastitis')}}" class="btn btn-warning btn-block btn-home-admin"download>MASTITIS</a>
                </div>
            </div>                     
        </div>
        <hr>
         <p>
         <a class="btn btn-primary"  href="{{route('dashboard-animal',$slug_animal) }}"<i class="fa fa-chevron-circle-left" download></i>REGRESAR</a>          
    </p>
                  
    </div>
    <hr>

   

@stop