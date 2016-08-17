<!DOCTYPE html>
<html>
<head>
	<title>Calendario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="BovinApp,agropecuaria,trazabilidad,san carlos, dos pinos, rastreabilidad" />

	<!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom styles for this template -->

	
	
    <link href="{{ asset('/css/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/event/daterangepicker.css') }}" rel="stylesheet">
</head>
<body>
	@if(\Session::has('message'))
        @include('admin.partials.message')
 @endif
<!-- Fixed navbar -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Mi Finca</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand main-title">Mi Finca</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
             <li class="dropdown"><a href="{{route('badamecum-farm')}}"><i class="fa fa-dashboard"></i>Badamecum</a></li>
             <li class="dropdown"><a href="{{route('animal-index')}}"><i class="fa fa-dashboard"></i>Animal</a></li>
             <li class="dropdown"><a href="{{route('farm-index')}}"><i class="fa fa-dashboard"></i>Fincas</a></li>
             <li><a href="{{ route('store')}}"><i class="fa fa-shopping-cart"></i>Almacen</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <i class="fa fa-user"></i> {{ Auth::user()->user }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('logout') }}">Finalizar sesión</a></li>
                </ul>
              </li>            
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

    @yield('content')
    
    </div> <!-- /container -->
<footer class="text-center slideanim slide">
  @include('layouts.partials.footer') 
</footer>


  
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="{{ asset('/js/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('/js/fullcalendar/daterangepicker.js') }}"></script>
     <script src="{{ asset('/js/fullcalendar/fullcalendar.min.js') }}"></script>
  
  
  @yield('js')

</body>
</html>