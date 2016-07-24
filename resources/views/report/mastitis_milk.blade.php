<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reporte Mastitis</title>
  <link rel="stylesheet" type="text/css" href="css/report/table.css">
</head>
<body>
  <h1>Registro de Mastitis</h1>
  <h2>Animal: {{$animals->slug}}</h2>
  <h3>Fecha de Emisión: </h3>

   
      <div class="table-cart">
        @if(count($productions))
        
        <div class="table-responsive">
             <table >
                <thead>
                    <tr>
                                                
                        <th>Fecha</th>                         
                        <th>Mañana</th>
                        <th>Mastitis</th>
                        <th>Tarde</th>
                        <th>Mastitis</th>                                              
                    </tr>
                </thead>
                <tbody>
                    @foreach($productions as $production)
                        

                        <tr>
                            <td>{{ $production->date }}</td>
                            <td>{{ $production->morning_production }}</td>
                             <td>{{ $production->mastitis_morning == 1 ? "Si" : "No" }}</td>
                            <td>{{ $production->later_production }}</td>
                            <td>{{ $production->mastitis_later == 1 ? "Si" : "No" }}</td>               
                            
                        </tr>
                    @endforeach
                    </tbody>                    
             </table><hr>
          
        </div>

        <h2>Cantidad de leche con mastitis: {{$quantity}}</h2>
        <h2>Valor de la cantidad de leche con mastitis: {{$value}}</h2>
        @else
          <h3><span class="label label-warning">Noy hay nada que mostrar</span></h3>
        @endif
             
      </div>        

  
</body>
</html>