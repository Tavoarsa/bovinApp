<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reporte Injecciones</title>
  <link rel="stylesheet" type="text/css" href="css/report/table.css">
</head>
<body>
  <h1>Registro de Injecciones</h1>
  <h2>Animal:{{$animals->slug}} </h2>
  <h3>Fecha de Emisión: </h3>

    <h1>Injecciones Aplicadas</h1>
      <div class="table-cart">
        @if(count($injecctions))
        
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <head>
              <tr>
                              
                <th>Enfermedad</th>               
                <th>Vacuna</th>
                <th>Fecha<br>Aplicada</th>
                <th>Proxima<br>Aplicación</th>
                <th>Responsable</th>
                
                
              </tr>
            </head>
            <tbody>
              @foreach($injecctions as $injecction)
                <tr>
                                  
                  <td>{{$injecction->diseaseName}}</td>                 
                  <td>{{$injecction->injecctionName}}</td>
                  <td>{{$injecction->dateApplication}}</td>
                  <td>{{$injecction->boosterInjection}}</td>
                  <td>{{$injecction->responsible}}</td>               
                                
                  
                </tr>
              @endforeach
            </tbody>            
          </table><hr>
          
        </div>
        @else
          <h3><span class="label label-warning">Noy hay Ninguna Inyeccion Aplicada</span></h3>
        @endif
        <hr>        
      </div>        

  
</body>
</html>