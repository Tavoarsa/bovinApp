@extends('layouts.farm')
@section('content')
<div class="container text-center">
    
        <div class="container">
        {!!Form::open(['route'=>'search-animal','method'=>'GET'])!!}
            <div class="row">
                 
                <div class="col-md-12">
                    <div class="input-group" id="adv-search">
                    
                        <input type="text" name="name" class="form-control" placeholder="Buscar Animales" />
                      

                        <div class="input-group-btn">

                        

                           
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                          
                        </div>


                        </div>
                         <div class="checkbox">
                                 <label><input  name="number"  type="checkbox" >Buscar por Número de Animal</label>
                            </div>

                    
                    </div>
                     
            </div>
         {!! Form::close() !!}
        </div>
           
    
   
	
		<div class="page">
            <h1>                
                <a href="{{ route('animal-create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Agregar</a>            
            </h1>
            @if(count($animals))
    			<div class="row">
    				@foreach($animals as $animal)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">                                      
                                <a href="{{route('dashboard-animal',$animal->slug)}}">
                                    <img src="/img/animal/{{$animal->image}}" alt="{{$animal->name}}">
                                </a>                                
                            <div class="caption">                                        
                                <h3 >{{$animal->name}}</h3>
                                <h4>{{$animal->animalNumber}}</h4>
                                @if($animal->status==1)
                                <a href="{{route('info-sale',$animal->slug)}}"><i class="fa fa-info"   aria-hidden="true"></i>En venta</a>
                                @endif
                            </div>
                            </div>
                        </div>
                    @endforeach                           
                </div>
                <?php echo $animals->render(); ?>
            @else
            <h3><span class="label label-warning">Noy hay Ningún animal registrado para su Finca</span></h3>
            @endif
            <hr>
            <p>
                <a class="btn btn-primary" href="{{route('dashboard-farm',$farm)}}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>          
            </p>
                   
	   </div>

</div>





@stop