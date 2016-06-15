@extends('layouts.farm')
@section('content')
<div class="container text-center">
		<div class="page-header">
			<h1>				
			<a href="{{ route('animal-create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Agregar</a>            
			</h1>
		</div>
		<div class="page">
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
                <a class="btn btn-primary" href="{{route('farm-index')}}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>          
            </p>
                   
	   </div>

</div>





@stop