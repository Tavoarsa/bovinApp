<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de Peso del aimal: {{$animals->name}}</title>
	<link rel="stylesheet" type="text/css" href="css/report/table.css">
</head>
<body>

<div >
      <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>                                                          
                                <th>Fecha</th>                         
                                <th>Peso</th>                               
                                <th>Precio</th>                                
                            </tr>
                        </thead>
                          <tbody>
                        @foreach($weights as $weight)
                            <tr>
                                <td>{{ $weight->date }}</td>                                
                                <td>{{ $weight->weight }}</td>
                                <td>{{ $weight->price_weight }}</td>

                                
                                
                            </tr>
                        @endforeach
                    </tbody>                    
    </table><hr>                 
</div>
	
</body>
</html>