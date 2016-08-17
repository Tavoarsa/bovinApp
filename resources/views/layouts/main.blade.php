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
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/lumen/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/error/404.css" rel="stylesheet" type="text/css" media="all">

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/caption-hover.css" />
<link rel="stylesheet" type="text/css" href="css/circle-hover.css" />
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">


<link href="css/error/404.css" rel="stylesheet" type="text/css" media="all">
<!-- /css links -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.js"></script> 
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
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
          <a class="navbar-brand main-title"  href="#">Bovinapp</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <p class="navbar-text"></p>
          
           <ul class="nav navbar-nav navbar-right">
             <li class="active"><a href="{{ url('farm') }}">Mi Finca</a></li>
             <li><a href="#about">Acerca de BovinApp</a></li>
             <li><a href="#services">Servicios</a></li>
             <li><a href="#portfolio">Noticias</a></li>
             <li><a href="#contact">Contacto</a></li>   
             <li><a href="{{ route('store')}}">Comprar<i class="fa fa-shopping-cart"></i></a></li>
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/index.js"></script>
<script src="js/index2.js"></script>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

  // Store hash
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
  $('html, body').animate({
    scrollTop: $(hash).offset().top,
  }, 900, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;
    });
  });
})
</script>
<script>
$(window).scroll(function() {
  $(".slideanim").each(function(){
    var pos = $(this).offset().top;

    var winTop = $(window).scrollTop();
    if (pos < winTop + 600) {
      $(this).addClass("slide");
    }
  });
});
</script>
<!-- /js files -->
</body>
</html>


