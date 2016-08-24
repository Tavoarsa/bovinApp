@extends('layouts.farm')
@section('content')
<div class="content-section-a">
    <div class="container" text-center>
    @foreach($animal as $animals)
        <div class="page-header">
            <h1><i class="fa fa-info-circle"></i>Estadistica Animal: {{$animals->name}}</h1>            
        </div>
        <div class="row">
        <div class="col-md-6">         

         <h2>Producción Total</h2>

        <div class="table-cart">
           
            
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <head>
                        <tr>
                            <th>Producción (kg)</th>                         
                            <th>Valor Producción</th>                         
                           
                        </tr>
                    </head>
                    <tbody> 
                                      
                            <tr>                                                              
                                <td>{{number_format($total_production,0)}}</td>                               
                                <td>¢ {{number_format($price_production,2)}}</td> 
                                                                                              
                                                
                                
                            </tr>
                    
                       
                    </tbody>                    
                </table><hr>
                
            </div>
           
           
        </div>
        <h2>Producción Sana</h2>

             <div class="table-cart">
           
            
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <head>
                        <tr>
                            <th>Producción(kg)</th>                         
                            <th>Valor Producción</th>                         
                           
                        </tr>
                    </head>
                    <tbody> 
                                        
                            <tr>                                                              
                                <td>{{number_format($total_production_good,0)}}</td>                               
                                <td>¢ {{number_format($value_production_good,2)}}</td> 
                                                                                              
                                                
                                
                            </tr>
                   
                       
                    </tbody>                    
                </table><hr>
                
            </div>
           
           
        </div>

           <h2>Producción De Retiro</h2>

             <div class="table-cart">
           
            
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <head>
                        <tr>
                            <th>Producción(kg)</th>                         
                            <th>Valor Producción con Mastitis</th>                         
                           
                        </tr>
                    </head>
                    <tbody>                                          
                            <tr>                                                              
                                <td>{{number_format($total_production_matitis,0)}}</td>                               
                                <td>¢ {{number_format($value_mastitis_milk,2)}}</td> 
                                                                                              
                                                
                                
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
                                <td>¢  {{number_format($total_gastos,2)}}</td>                   
                                
                            </tr>
                       
                    </tbody>                    
                </table><hr>
                
            </div>
           
           
        </div>
        <div align="center">
            <h2>Ganancias: </h2>
            <h3>¢ {{number_format($receipts,2)}}</h3>            

        </div>

        
                
                </div>                
            </div>
            <hr>
            <p>
                <a class="btn btn-primary" href="{{route('dashboard-animal',$animals->slug)}}"><i class="fa fa-chevron-circle-left"></i>REGRESAR</a>
                


                
            </p>
        @endforeach 
                 
        </div>
    </div>
</div>

@stop

 