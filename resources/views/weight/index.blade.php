@extends('layouts.farm')

@section('content')

<div class="container text-center">
        <div class="page-header">           
            <h1>
                <a  value="Mostrar" onclick="add()" class="btn btn-warning"> <i class="fa fa-plus-circle"></i> Agregar</a>
                <a href="{{ route('report-weight') }}" class="btn btn-warning"><i class="fa fa-list-alt"></i>  Reporte</a>
            </h1>        
            <h3>
                Precio por kilo: {{$price_weight}}
                <br>
                    <a type="button" value="Cambiar" onclick="price()"   class="btn btn-secondary"><i class="fa fa-undo"></i>  Cambiar</a>
            </h3>
        </div>

        <div  class="row">
            <div class="col-md-offset-3 col-md-6">

                <div id="price" class="page">
                
                   
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::open(
                         array(
                            'route' => 'price_weight.store', 
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
                            <a href="{{route('weight-index')}}" class="btn btn-warning">Cancelar</a>
                        </div>                    
                    {!! Form::close() !!}                    
                </div>

           
                
                <div id="add" class="page">
                
                   
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::open(
                         array(
                            'route' => 'weight.store', 
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
                            <label for="weight">peso</label>
                            
                            {!! 
                                Form::text(
                                    'weight', 
                                    null, 
                                    array(
                                        'class'=>'form-control',                                       
                                        'autofocus' => 'autofocus',
                                        'placeholder' => 'Ingresa el peso...'
                                    )
                                ) 
                            !!}
                        </div>

                                    
                        <div class="form-group">
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{route('weight-index')}}" class="btn btn-warning">Cancelar</a>
                        </div>                    
                    {!! Form::close() !!}                    
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Editar</th>                            
                                <th>Fecha</th>                         
                                <th>Peso</th>                               
                                <th>Precio</th>                                
                            </tr>
                        </thead>
                          <tbody>
                        @foreach($weights as $weight)
                            <tr>
                                <td>
                                    <a href="{{ route('weight.edit', $weight->id) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>                                
                                <td>{{ $weight->date }}</td>                                
                                <td>{{ $weight->weight }}</td>
                                <td>{{ $weight->price_weight }}</td>

                                
                                
                            </tr>
                        @endforeach
                    </tbody>                    
                    </table><hr>                
                </div>
                
            </div>
        </div>
        

    </div>

@stop