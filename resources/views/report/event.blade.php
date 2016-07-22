<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro Productivo del aimal: </title>
	<link rel="stylesheet" type="text/css" href="css/report/table.css">
</head>
<body>



<div >
    <table >
        <thead>
            <tr>
                                        
                <th>Nombre</th>                         
                                             
            </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
               
               
            </tr>
        @endforeach
        </tbody>                    
   </table><hr> 

              
</div>
	
</body>
</html>