<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registro Clinico</title>
  <link rel="stylesheet" type="text/css" href="css/report/table.css">
</head>
<body>
  <h1>Registro Clinico</h1>
  <h2>Animal:{{$animals->slug}} </h2>
  <h3>Fecha de Emisión: </h3>

  <div class="table-cart">
  @if(count($vaccines))
       
          <h1>Vacunas Aplicadas</h1>
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
              @foreach($vaccines as $vaccine)
                <tr>                              
                  <td>{{$vaccine->diseaseName}}</td>                  
                  <td>{{$vaccine->vaccineName}}</td>
                  <td>{{$vaccine->dateApplication}}</td>
                  <td>{{$vaccine->boosterInjection}}</td>
                  <td>{{$vaccine->responsible}}</td>   
                </tr>
              @endforeach
            </tbody>            
          </table><hr>
          
        </div>
        @else
          <h3><span class="label label-warning">Noy hay Ninguna Vacuna aplicada</span></h3>
        @endif
    </div>
       
        </br> 
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
 </div>
  
</body>
</html>