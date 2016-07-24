<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reporte Producción Lechera</title>
  <link rel="stylesheet" type="text/css" href="css/report/table.css">
</head>
<body>
  <h1>Registro Productivo</h1>
  <h2>Animal:{{$animals->slug}} </h2>
  <h3>Fecha de Emisión: </h3>

<div class="table-cart">  
    <table >
        <thead>
            <tr>                                        
                <th>Fecha</th>                         
                <th>Mañana</th>
                <th>Tarde</th>
                <th>Total</th>
                <th>Precio</th>                                
            </tr>
        </thead>
        <tbody>
        @foreach($productions as $production)
            <tr>
                <td>{{ $production->date }}</td>
                <td>{{ $production->morning_production }}</td>
                <td>{{ $production->later_production }}</td>
                <td>{{ $production->total_production }}</td>
                <td>{{ $production->price_production }}</td>
            </tr>
        @endforeach
        </tbody>                    
   </table><hr>              

 </div>    
        
  
</body>
</html>