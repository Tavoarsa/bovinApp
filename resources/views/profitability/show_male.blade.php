@extends('layouts.farm')
@section('content')
<div class="content-section-a">
    <div class="container" text-center>
    @foreach($animal as $animals)
        <div class="page-header">
            <h1><i class="fa fa-info-circle"></i>Estadistica Animal: {{$animals->animalNumber}}</h1>            
        </div>
        <div class="row">
        <div class="col-md-6">         

         <h2 align="center">Historial de Pesos</h2>
           <div class="table-cart">
           
            
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <head>
                        <tr>
                            <th>Fecha</th>                         
                            <th>Pesor (kg)</th>
                            <th>Valor Aproximado</th>                          
                           
                        </tr>
                    </head>
                    <tbody> 
                                      
                            @foreach($total_weights as $total_weight)
                            <tr>
                                                              
                                <td>{{$total_weight->date}}</td>                               
                                <td>{{$total_weight->weight}}</td>
                                <td>¢{{$total_weight->price_weight}}</td>
                                                       
                                                        
                                
                            </tr>
                        @endforeach
                    
                       
                    </tbody>                    
                </table><hr>
                
            </div>
           
           
        </div>
         <h2 align="center">Valor Aproximado al último Peso</h2>

         <h3 style="background-color:orange" align="center"> ¢{{$weight_last}}</h3>

        <h2 align="center">Gastos</h2>

            <div class="table-cart">
           
            
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <head>
                        <tr>
                            <th>Inyecciones</th>                         
                            <th>Vacunas</th>                         
                            <th>Alimentos</th>
                            <th>Total Gastos</th>                            
                        </tr>
                    </head>
                    <tbody>                       
                            <tr>                                                              
                                <td>¢ {{number_format($cost_injecction,2)}}</td>                               
                                <td>¢ {{number_format($cost_vaccine,2)}}</td>                                                                       
                                <td> ¢ {{number_format($cost_aliment,2)}}</td>  
                                <td style="background-color:orange">¢  {{number_format($total_gastos,2)}}</td>                   
                                
                            </tr>
                       
                    </tbody>                    
                </table><hr>
                
            </div>
           
           
        </div>

      


        
       
          
           

            
        </div>
             
            <div class="col-md-6">
                <div class="product-block">
              
                    
                    <div class="product-info">

                    @piechart('IMDB', 'chart-div')
                     <div id="chart-div"></div>
                       
                    </div>
          
        <div align="center">
            <h2>Ganancias: </h2>
            <h3 style="background-color:orange">¢ {{number_format($receipts,2)}}</h3>            

        </div>

        
                
                </div>                
            </div>
            <hr>
           
            
        @endforeach 
                 
        </div>
         <div align="center">
                <p>
                 <a class="btn btn-primary" href="{{route('dashboard-animal',$animals->slug)}}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>        
                </p>
            </div>
    </div>
</div>

@stop

 