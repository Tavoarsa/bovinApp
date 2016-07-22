<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

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

        @foreach($total as $totales)
        	
            <tr>
                <td>{{ $totales->price}}</td>           
                           
                
            </tr>
        @endforeach
        </tbody>                    
   </table><hr>

   


   


	
</body>
</html>