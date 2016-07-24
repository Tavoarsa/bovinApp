<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mastitis</title>
  <link rel="stylesheet" type="text/css" href="css/report/table.css">
</head>
<body>
  <h1>Registro De Vacas con mastitis</h1>
  
  <h3>Fecha de Emisión: </h3>

 
    <div class="table-responsive">

        <table class="table table-striped table-hover table-bordered">
             <thead>
                 <tr>                                                          
                    <th>Fecha</th>                         
                    <th>Animal</th>
                    <th>Mañana</th>
                    <th>Tarde</th>                               
                                                 
                </tr>
            </thead>
            <tbody>
             @foreach($animals_mastitis as $animals_mastiti)
              
                <tr>
                
                    <td>{{ $animals_mastiti->date }}</td>                                
                    <td>{{ $animals_mastiti->name }}</td>
                    <td>{{ $animals_mastiti->mastitis_morning == 1 ? "Si" : "No" }}</td>
                    <td>{{ $animals_mastiti->mastitis_later == 1 ? "Si" : "No" }}</td> 
                                           
                                
                </tr>
                  
            @endforeach
            </tbody>                    
            </table><hr>
          
     </div> 
</body>
</html>