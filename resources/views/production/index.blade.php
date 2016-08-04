@extends('layouts.farm')

@section('content')

<div class="container text-center">
        <div class="page-header">           
            <h1>
                <a  value="Mostrar" onclick="add()" class="btn btn-warning"> <i class="fa fa-plus-circle"></i> Agregar</a>
                <a href="{{ route('report-production') }}" class="btn btn-warning" download><i class="fa fa-list-alt"></i>  Reporte Productivo</a>
            </h1>        
            <h3>
                Precio por kilo: {{$price_milk}}
                <br>
                    <a type="button" value="Cambiar" onclick="price()"   class="btn btn-secondary"><i class="fa fa-undo"></i>  Cambiar</a>
            </h3>
        </div>

        <div  class="row">
            <div class="col-md-offset-3 col-md-6">
             @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    

                <div id="price" class="page">
                
                   
                    {!! Form::open(
                         array(
                            'route' => 'price_milk.store', 
                            'class' => 'form', 
                            'novalidate' => 'novalidate', 
                            'files' => true)) !!}
                       
                         <div class="form-group">
                            <label for="price">Nuevo precio:</label>
                            
                            {!! 
                                Form::text(
                                    'price', 
                                    null, 
                                    array(
                                        'class'=>'form-control',                                       
                                        'autofocus' => 'autofocus',
                                        'placeholder' => 'Ingresa el nuevo precio...'
                                    )
                                ) 
                            !!}


                        </div>

                           <div class="form-group">
                            <label for="details">Detalle: </label>
                            
                            {!! 
                                Form::text(
                                    'details', 
                                    null, 
                                    array(
                                        'class'=>'form-control',                                       
                                        'autofocus' => 'autofocus',
                                        'placeholder' => 'Ingresa un detalle'
                                    )
                                ) 
                            !!}
                        </div>

                                   
                        <div class="form-group">
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{route('production-index')}}" class="btn btn-warning">Cancelar</a>
                        </div>                    
                    {!! Form::close() !!}                    
                </div>

           
                
                <div id="add" class="page">           
                   
                    
                    
                    {!! Form::open(
                         array(
                            'route' => 'production.store', 
                            'class' => 'form', 
                            'novalidate' => 'novalidate', 
                            'files' => true)) !!}
                        
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <div class="input-group">
                                {!! Form::text('date', null, array("class" => "date")) !!}
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="morning_production">Mañana:</label>
                            
                            {!! 
                                Form::text(
                                    'morning_production', 
                                    null, 
                                    array(
                                        'class'=>'form-control',                                       
                                        'autofocus' => 'autofocus',
                                        'placeholder' => 'Ingresa la cantidad de leche...'
                                    )
                                ) 
                            !!}
                            <label for="mastitis"> Mastitis: </label>

                            {!!Form::checkbox('mastitis_morning',1,false)!!}
                        </div>

                        <!-- <div class="form-group">
                            <label for="later_production">Tarde</label>
                            
                            {!! 
                                Form::text(
                                    'later_production', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa la cantidad de leche...',
                                        'autofocus' => 'autofocus',
                                        'value'=>0
                                    )
                                ) 
                            !!}
                        </div>     -->              
                        <div class="form-group">
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{route('production-index')}}" class="btn btn-warning">Cancelar</a>
                        </div>                    
                    {!! Form::close() !!}                    
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Editar</th>                            
                                <th>Fecha</th>                         
                                <th>Mañana</th>
                                <th>Mastitis</th>
                                <th>Tarde</th>
                                <th>Mastitis</th>
                                <th>Total</th>                                
                            </tr>
                        </thead>
                          <tbody>
                        @foreach($productions as $production)
                            <tr>
                                <td>
                                    <a href="{{ route('production.edit', $production->id) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>                                
                                <td>{{ $production->date }}</td>
                                <td>{{ $production->morning_production }}</td>
                                 <td>{{ $production->mastitis_morning == 1 ? "Si" : "No" }}</td>
                                <td>{{ $production->later_production }}</td>
                                 <td>{{ $production->mastitis_later == 1 ? "Si" : "No" }}</td>
                                <td>{{ $production->total_production }}</td>

                                
                                
                            </tr>
                        @endforeach
                    </tbody>                    
                    </table><hr> 
                      <a type="button"  href="{{ route('report-production_mastitis') }}"  class="btn btn-secondary"><i class="fa fa-thumbs-down" aria-hidden="true"></i>REPORTE MASTITIS</a>               
                </div>
                 <p>
                <a class="btn btn-primary" href="{{route('dashboard-animal',$slug)}}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>          
            </p>
                
            </div>
        </div>    

    </div>
    <script src="{{ asset('/js/create-animal.js') }}"></script>

@stop