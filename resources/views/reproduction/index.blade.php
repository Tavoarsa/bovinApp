@extends('layouts.farm')

@section('content')

<div class="container text-center">
        <div class="page-header">           
            <h1>
                Registro Reproductivo: {{$animals->name}}<br>


                <a  value="Mostrar" onclick="add()" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Agregar</a>
            </h1>        
        </div>

        <div  class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div id="add" class="page">
                
                   
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    {!! Form::open(
                         array(
                            'route' => 'reproduction.store', 
                            'class' => 'form', 
                            'novalidate' => 'novalidate', 
                            'files' => true)) !!}
                        
                        <div class="form-group">
                            <label for="birthdate">Fecha Del Celo</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="birthdate">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>                   
                        <div class="form-group">
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{route('reproduction-index',$animals->slug)}}" class="btn btn-warning">Cancelar</a>
                        </div>                    
                    {!! Form::close() !!}                    
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Editar</th>                            
                                <th>Fecha de celo</th>                         
                                <th>Fecundación</th>
                                <th>Posible Parto</th>
                                <th>Palpación</th>
                                <th>Tipo de Parto</th>
                                <th>Sexo Becerro</th>
                            </tr>
                        </thead>
                          <tbody>
                        @foreach($reproductions as $reproduction)
                            <tr>
                                <td>
                                    <a href="{{ route('reproduction.edit', $reproduction->id) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>                                
                                <td>{{ $reproduction->heat_date }}</td>
                                <td>{{ $reproduction->fertilization }}</td>
                                <td>{{ $reproduction->likely_date }}</td>
                                <td>{{ $reproduction->palpation_date }}</td>
                                <td>{{ $reproduction->parturition }}</td>
                                <td>{{ $reproduction->gender_calf }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>                    
                    </table><hr>                
                </div>
                
            </div>
        </div>
        

    </div>

@stop