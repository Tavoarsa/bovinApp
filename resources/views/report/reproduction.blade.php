<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reporte Reproductivo</title>
  <link rel="stylesheet" type="text/css" href="css/report/table.css">
</head>
<body>
  <h1>Registro Reproductivo del animal: {{$animals->name}}</h1>
  <h3>Fecha de Emisión: </h3>
   <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                                                         
                    <th>Fecha de celo</th>                         
                    <th>Fecundación</th>
                    <th>Posible Parto</th>
                    <th>Palpación</th>
                    <th>Tipo de Parto</th>
                    <th>Sexo Becerro</th>
                </tr>
            </thead>
            <tbody>
            @foreach($reproductions as $reproduction)
                <tr>
                                                     
                    <td>{{ $reproduction->heat_date }}</td>
                    <td>{{ $reproduction->fertilization }}</td>
                    <td>{{ $reproduction->likely_date }}</td>
                    <td>{{ $reproduction->palpation_date }}</td>
                    <td>{{ $reproduction->parturition }}</td>
                    <td>{{ $reproduction->gender_calf }}</td>
                             
                </tr>
            @endforeach
            </tbody>                    
        </table><hr>                            
     </div>
  
</body>
</html>






