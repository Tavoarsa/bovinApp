<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro Productivo del aimal: {{$animals->name}}</title>
	<link rel="stylesheet" type="text/css" href="css/report/table.css">
</head>
<body>

<div >
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