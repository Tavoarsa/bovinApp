<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Mi finca</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="BovinApp,agropecuaria,trazabilidad,san carlos, dos pinos, rastreabilidad" />
<!-- css links -->
 <link href="{{ asset('/css/catalago.css') }}" rel="stylesheet">
 <link href="{{ asset('/css/create-animal.css') }}" rel="stylesheet">
 <!--Datepicker Files -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">



<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/lumen/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto+Slab' rel='stylesheet' type='text/css'>

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
@if(\Session::has('message'))
        @include('admin.partials.message')
 @endif
<!-- Fixed navbar -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand main-title">Bovinapp.com</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
             <li class="dropdown"><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
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


@yield('content')


</body>
<!-- /Contact-Form -->
<!-- Footer -->
<footer class="text-center slideanim slide">
  @include('layouts.partials.footer')


</footer>
<!-- js files -->




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="{{ asset('/js/detalle-pedido.js') }}"></script>
<!--Datepicker Files -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
  $(function() {
    $( ".date" ).datepicker();
  });
  </script>

<!--<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>-->

<!--<script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>-->

<script src="{{ asset('/js/create-animal.js') }}"></script>
<script src="{{ asset('/js/create-animal-ia.js') }}"></script>
<script src="{{ asset('/js/create-animal-fi.js') }}"></script>
<script src="{{ asset('/js/create-animal-te.js') }}"></script>
<script src="{{ asset('/js/create-animal-mt.js') }}"></script> 


<script src="{{ asset('/js/create-badamecum.js') }}"></script>






</html>

