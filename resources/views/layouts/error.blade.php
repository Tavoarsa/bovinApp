<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>BovinApp</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="BovinApp,agropecuaria,trazabilidad,san carlos, dos pinos, rastreabilidad" />
<!-- css links -->
 <link href="{{ asset('/css/catalago.css') }}" rel="stylesheet">

<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/lumen/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/error/404.css" rel="stylesheet" type="text/css" media="all">

<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto+Slab' rel='stylesheet' type='text/css'>

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

@if(\Session::has('message'))
        @include('store.partials.message')
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
          <a class="navbar-brand main-title"  href="#">Tienda De Equipos para su Finca</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <p class="navbar-text"></p>
          
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('cart-show')}}"><i class="fa fa-shopping-cart"></i></a></li>
             @include('layouts.partials.menu-user')
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
<script src="/js/bootstrap.min.js"></script>
<script src={{asset('js/pinterest_grid.js')}}></script>
<script src="/js/catalogo.js"></script>

</body>
</html>

