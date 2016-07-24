<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reporte Peso</title>
  <link rel="stylesheet" type="text/css" href="css/report/table.css">
</head>
<body>
  <h1>Registro De peso</h1>
  <h2>Animal:{{$animals->slug}} </h2>
  <h3>Fecha de Emisión: </h3>

 
    <div class="table-responsive">

        <table class="table table-striped table-hover table-bordered">
             <thead>
                 <tr>                                                          
                    <th>Fecha</th>                         
                    <th>Peso</th>                               
                    <th>Posible Valor de Animal</th>                                
                </tr>
            </thead>
            <tbody>
             @foreach($weights as $weight)
                <tr>
                    <td>{{ $weight->date }}</td>                                
                    <td>{{ $weight->weight }}</td>
                    <td>$ {{ $weight->price_weight }}</td>                               
                                
                </tr>
            @endforeach
            </tbody>                    
            </table><hr>
          
     </div> 
</body>
</html>