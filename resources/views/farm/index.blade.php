@extends('layouts.farm')
@section('content')
<div class="container text-center">
		<div class="page-header">
			<h1>				
			<a href="{{ route('farm.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Agregar</a>
			</h1>
		</div>
		<div class="page">
            @if(count($farms))
    			<div class="row">
    				@foreach($farms as $farm)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">                                      
                                <a href="{{ url('/portal',$farm->id) }}">
                                    <img src="/img/farm/{{$farm->patent}}" alt="{{$farm->name}}">
                                </a>                                
                            <div class="caption">                                        
                                <h3 >{{$farm->name}}</h3>
                            </div>
                            </div>
                        </div>
                    @endforeach                           
                </div>
                <?php echo $farms->render(); ?>
            @else
            <h3><span class="label label-warning">Noy hay Ninguna finca registrada para su Usuario</span></h3>
            @endif
                   
	   </div>
</div>





@stop