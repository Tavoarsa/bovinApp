@extends('layouts.farm')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i>MI FINCA- DASHBOARD</h1>
        </div>
        
        <h2>Bienvenido(a) {{ Auth::user()->user }} al Panel Principal.</h2><hr>
     
        
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
                    <a href="{{route('farm-index') }}" class="btn btn-warning btn-block btn-home-admin">FINCA</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-warning btn-block btn-home-admin">VENTA DE ANIMALES</a>
                </div>
            </div>

          

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="{{ route('badamecum-farm') }}" class="btn btn-warning btn-block btn-home-admin">BADAMECUM</a>
                </div>
            </div>
                    
        </div>
       
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-cc-paypal  icon-home"></i>
                    <a href="{{ route('admin.order.index') }}" class="btn btn-warning btn-block btn-home-admin">REPORTES</a>
                </div>
            </div> 
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-warning btn-block btn-home-admin">ESTADISTICAS</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-warning btn-block btn-home-admin">CALENDARIO</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-warning btn-block btn-home-admin">ALIMENTACION</a>
                </div>
            </div>

             <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-warning btn-block btn-home-admin">SOCIAL</a>
                </div>
            </div>
                    
        </div>
        
    </div>
    <hr>

@stop