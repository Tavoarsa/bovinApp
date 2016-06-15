@extends('layouts.main')
@section('content')
<div class="container text-center">
        <div class="page-header">
            <h1>                
                       
            </h1>
        </div>
        <div class="page">
            @if(count($badamecums))
            <div class="row">
                @foreach($badamecums as $badamecum)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">                                      
                        <img src="/img/badamecum/{{$badamecum->image}}" alt="{{$badamecum->name}}">    
                        <div class="caption">                                        
                            <h3 >{{$badamecum->name}}</h3>

                        </div>
                        <p>
                            <a class="btn btn-primary" href="{{route('detail-badamecum',$badamecum->slug)}}"><i class="fa fa-chevron-circle-right"></i>Leer mas</a>
                        </p>
                    </div>
                </div>
                @endforeach                           
                </div>
                <?php echo $badamecums->render(); ?>
            @else
            <h3><span class="label label-warning">Noy hay Ningún producto registrado</span></h3>
            @endif
            <hr>           
            <p>
                <a class="btn btn-primary" href="{{route('home')}}"><i class="fa fa-rocket"></i>Home</a>          
            </p>

            
                   
       </div>

</div>
<hr>





@stop