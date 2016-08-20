@extends('layouts.farm')
@section('content')

<div class="content-section-a">
    <div class="container" text-center>
        <div align="center" class="page-header">
            <h1><i class="fa fa-info"></i>Detalle de la Venta</h1>            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="sale-image">
                    <img src="/img/animal/{{$animal->image}}" alt="{{$animal->name}}"  width="300">  
                </div>
                <h3>{{$animal->name}}</h3><hr>
                @if($animal->age==0)
                    <p>Edad:Menos de una año</p><hr>
                @else
                    <p>Edad: {{$animal->age}} años</p><hr>
                @endif
                <p>Registro de Animal: {{$animal->registrationNumber}}</p><hr>
                <p>Sexo: {{$animal->gender}}</p><hr>
                <p>Raza: {{$animal->breed}}</p><hr>           
                
            </div>
            <div class="col-md-6">
                <div class="product-block">                
                    <div class="product-info">
                        <h1><i class="fa fa-user-secret" aria-hidden="true"></i>Información del Vendedor</h1>
                        <h3>Nombre del vendedor: {{$user->name}}</h3><hr>
                        <p>Correo: {{$user->email}}</p><hr>
                        <p>Dirección: {{$user->address}}</p><hr>                
                    </div>
                    <div class="page">                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif                    
                    {!! Form::open(['route'=>'sale.store']) !!}

                    <div hidden class="form-group">
                        {!!Form::text('id',$animal->id) !!}                                
                    </div>

                    <div class="form-group">
                            <label for="phone">Telefono</label>
                            
                            {!! 
                                Form::number(
                                    'phone', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el número de telefono...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                    </div>                       
                                           
                    <div class="form-group">
                            <label for="price">Precio:</label>
                            
                            {!! 
                                Form::number(
                                    'price', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el Precio del animals...',
                                        
                                    )
                                ) 
                            !!}
                    </div>

                    <div class="form-group">
                            <label for="details">Detalles:</label>
                            
                            {!! 
                                Form::textarea(
                                    'details', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa un coementario del animal...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                    </div>                      
                        
                    <div align="center" class="form-group">

                        {!! Form::submit('Procesar Venta', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('dashboard-animal',$animal->slug) }}" class="btn btn-warning">Regresar</a>
                    </div>                    
                    {!! Form::close() !!}                    
                </div>
                </div>                
            </div>        	
        </div>
    </div>
</div>


@stop