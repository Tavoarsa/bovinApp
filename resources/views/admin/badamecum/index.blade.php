@extends('layouts.admin')

@section('content')

<div class="content-section-a">
    <div class="container" text-center>
        <div class="page-header">
            <h1>
                <i class="fa fa-info"></i>
                PRODUCTOS VETERINARIOS
                <a href="{{ route('admin.badamecum.create') }}" class="btn btn-warning">
                    <i class="fa fa-plus-circle"></i> Producto
                </a>
            </h1>
        </div>
        <div class="page">
        @if(count($badamecums))
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Imagen</th>
                            <th>Nombre</th>                           
                            <th>Precio</th>
                            <th>Visible</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($badamecums as $badamecum)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.badamecum.edit', $badamecum->slug) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['admin.badamecum.destroy', $badamecum->slug]]) !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                                <td><img class="img-index" src="/img/badamecum/{{$badamecum->image}}"></td>
                                <td>{{ $badamecum->name }}</td>                           
                               
                                <td>${{ number_format($badamecum->price,2) }}</td>
                                <td>{{ $badamecum->visible == 1 ? "Si" : "No" }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            
            <hr>
            
            <?php echo $badamecums->render(); ?>


             @else
             <h3><span class="label label-warning">Noy hay productos</span></h3>
            @endif

             <div align="center">
         <a class="btn btn-primary" href="{{url('admin')}}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>      
        </div>
            
        </div>

    </div>
</div>


@stop