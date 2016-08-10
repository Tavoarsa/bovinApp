@extends('layouts.main')
@section('content')

<!-- /Fixed navbar -->  
<!-- Banner -->
<div class="banner">
    <div id="content">
        <div id="slider">
            <img src="images/banner1.jpg" alt="Finca" data-url="#1">
            <img src="images/banner2.jpg" alt="The Good" data-url="#2">
            <img src="images/banner3.jpg" alt="Vegetable Farm" data-url="#3">
            <img src="images/banner4.jpg" alt="To Life" data-url="#4">
        </div>
    </div>  
</div>
<!-- /Banner -->
<!-- /Services -->
<section class="our-services" id="services">
    <h3 class="text-center slideanim">Nuestros Servicios</h3>
    <ul class="ch-grid">
        <li>
            <div class="ch-item ch-img-1 slideanim">                
                <div class="ch-info-wrap">
                    <div class="ch-info">
                     
            
                        <div class="ch-info-front ch-img-1"></div>
                        <div class="ch-info-back">
                            <h5>Busquedad</h5>
                            <a href="{{ route('search') }}" >Información de Fincas </a>
                        </div>  
                    </div>
                </div>
            </div>
            <h4 class="slideanim">Rastreabilidad</h4>
            <p class="slideanim">Busquedad de Fincas</p>
        </li>
        <li>
            <div class="ch-item ch-img-2 slideanim">
                <div class="ch-info-wrap">
                    <div class="ch-info">
                        <div class="ch-info-front ch-img-2"></div>
                        <div class="ch-info-back">
                            <h5>Badamecum</h5>
                            <a href="{{ route('badamecum-index') }}" >Catalago de Productos veterinarios</a>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="slideanim">Productos Veterinarios</h4>
            <p class="slideanim">Badamecum</p>
        </li>
        <li>
            <div class="ch-item ch-img-3 slideanim">
                <div class="ch-info-wrap">
                    <div class="ch-info">
                        <div class="ch-info-front ch-img-3"></div>
                        <div class="ch-info-back">
                            <h5>Venta de Animlaes</h5>
                            <a href="{{ route('sale-animal') }}" >Comprar Animales</a>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="slideanim">Venta de Animlaes</h4>
            <p class="slideanim">Información de animales en venta</p>
        </li>
        <li>
            <div class="ch-item ch-img-4 slideanim">
                <div class="ch-info-wrap">
                    <div class="ch-info">
                        <div class="ch-info-front ch-img-4"></div>
                        <div class="ch-info-back">
                            <h5>End Of Harvest</h5>
                            <p>Advanced Harvesting Techniques</p>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="slideanim">End Of Harvest</h4>
            <p class="slideanim">Using Advanced Harvesting Techniques</p>
        </li>
    </ul>
</section>
<!-- /Services -->
<!-- About -->
<section class="about-us" id="about">
    <h3 class="text-center slideanim">Acerca de Nosotros</h3>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2 slideanim">
                <p>BovinApp es la aplicación en linea ideal para llevar el registro de las actividades diarias de la finca ganadera. </p>
            </div>
            <div class="col-lg-4 slideanim">
                <p>LEs una herramienta eficaz para la toma de desiciones en el momento, brindado   al productor soluciones para el mejoramiento productivo de sus animales y su finca.</p>
            </div>
        </div>
    </div>
</section>
<!--
<div class="content-section-a">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <div class="content1">
                    <h3 class="section-heading slideanim">Vegetable Farm Building a Better Tomorrow.</h3>
                    <hr class="section-heading-spacer slideanim">
                    <div class="clearfix"></div>
                    <p class="lead slideanim">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6 slideanim">
                <ul class="grid cs-style">
                    <li>
                        <figure>
                            <img src="images/farm1.jpg" alt="" class="img-responsive">
                            <figcaption>
                                <h3>Vegetable Farm</h3>
                                <p>Building a Better Tomorrow.</p>
                            </figcaption>
                        </figure>
                    </li>
                </ul> 
            </div>
        </div>
    </div>
</div>
<div class="content-section-b">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 col-sm-push-6 col-sm-6">
                <div class="content2">
                    <h3 class="section-heading slideanim">Something Special About The Vegetable Farm</h3>
                    <hr class="section-heading-spacer slideanim">
                    <div class="clearfix"></div>
                    <p class="lead slideanim">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
            <div class="col-lg-5 col-sm-pull-6 col-sm-6 slideanim">
                <ul class="grid cs-style">
                    <li>
                        <figure>
                            <img src="images/farm2.jpg" alt="" class="img-responsive">
                            <figcaption>
                                <h3>Something Special</h3>
                                <p>About The Vegetable Farm</p>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="content-section-a">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <div class="content3">
                    <h3 class="section-heading slideanim">Vegetable Farm The Fresh Maker!</h3>
                    <hr class="section-heading-spacer slideanim">
                    <div class="clearfix"></div>
                    <p class="lead slideanim">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6 slideanim">
                <ul class="grid cs-style">
                    <li>
                        <figure>
                            <img src="images/farm3.jpg" alt="" class="img-responsive">
                            <figcaption>
                                <h3>Vegetable Farm</h3>
                                <p>The Fresh Maker!</p>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
-->
<!-- /About -->

<!-- Portfolio Grid Section -->
<section id="portfolio">
    <h3 class="text-center slideanim">Noticias</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item slideanim">
                <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-paper-plane-o"></i>
                        </div>
                    </div>
                    <img src="images/port1.jpg" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item slideanim">
                <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-paper-plane-o"></i>
                        </div>
                    </div>
                    <img src="images/port2.jpg" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item slideanim">
                <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-paper-plane-o"></i>
                        </div>
                    </div>
                    <img src="images/port3.jpg" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item slideanim">
                <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-paper-plane-o"></i>
                        </div>
                    </div>
                    <img src="images/port4.jpg" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item slideanim">
                <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-paper-plane-o"></i>
                        </div>
                    </div>
                    <img src="images/port5.jpg" class="img-responsive" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item slideanim">
                <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-paper-plane-o"></i>
                        </div>
                    </div>
                    <img src="images/port6.jpg" class="img-responsive" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
<!-- /Portfolio Grid Section -->
<!-- Portfolio Modals -->
<div class="portfolio-modal modal fade slideanim" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Importante</h3>
                        <hr>
                        <img src="images/port1.jpg" class="img-responsive img-centered" alt="">
                        <p></p>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Importante</h3>
                        <hr>
                        <img src="images/port2.jpg" class="img-responsive img-centered" alt="">
                        <p></p>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Vegetable Farm</h3>
                        <hr>
                        <img src="images/port3.jpg" class="img-responsive img-centered" alt="">
                        <p></p>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Importante</h3>
                        <hr>
                        <img src="images/port4.jpg" class="img-responsive img-centered" alt="">
                        <p></p>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Importante</h3>
                        <hr>
                        <img src="images/port5.jpg" class="img-responsive img-centered" alt="">
                        <p></p>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Importante</h3>
                        <hr>
                        <img src="images/port6.jpg" class="img-responsive img-centered" alt="">
                        <p></p>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Portfolio Modals -->
<!-- Blog
<section class="our-blog" id="blog">
    <h3 class="text-center slideanim">Our Blog</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <div class="view view-seventh slideanim">
                    <img src="images/blog1.jpg" alt="" class="img-responsive"/>
                    <div class="mask">
                        <h5>January 2,2016</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#contact-info" class="info">Write To Us</a>
                    </div>
                </div>
                <div class="blog-content slideanim">
                    <p class="p1">News - January 2,2016</p>
                    <a href="#"><h4>Its The Vegetable Farm You Can See.</h4></a>
                    <p class="p2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="view view-seventh slideanim">
                    <img src="images/blog2.jpg" alt="" class="img-responsive"/>
                    <div class="mask">
                        <h5>January 10,2016</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#contact-info" class="info">Write To Us</a>
                    </div>
                </div>
                <div class="blog-content slideanim">
                    <p class="p1">News - January 10,2016</p>
                    <a href="#"><h4>A Day With Vegetable Farm.</h4></a>
                    <p class="p2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="view view-seventh slideanim">
                    <img src="images/blog3.jpg" alt="" class="img-responsive"/>
                    <div class="mask">
                        <h5>January 15,2016</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#contact-info" class="info">Write To Us</a>
                    </div>
                </div>
                <div class="blog-content slideanim">
                    <p class="p1">News - January 15,2016</p>
                    <a href="#"><h4>Vegetable Farm For All.</h4></a>
                    <p class="p2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="view view-seventh slideanim">
                    <img src="images/blog4.jpg" alt="" class="img-responsive"/>
                    <div class="mask">
                        <h5>January 20,2016</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#contact-info" class="info">Write To Us</a>
                    </div>
                </div>
                <div class="blog-content slideanim">
                    <p class="p1">News - January 20,2016</p>
                    <a href="#"><h4>Vegetable Farm For Your Life.</h4></a>
                    <p class="p2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Blog -->
<!-- Contact-Us -->
<section class="contact-us" id="contact">
    <h3 class="text-center slideanim">Contactanos</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12 slideanim">
                <iframe class="googlemaps" src="https://www.google.com/maps/embed/v1/search?key=AIzaSyDM7jn6qkBe3IjJPK1KzSV0hWitcFv7pMU&q=record+stores+in+Seattle" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 col-xs-12 slideanim">
                <h4>Nuestros contactos :</h4>
                <p>Telefono: 86415183</p>
                <p>Email:<a href="mailto:name@example.com">tavo.cr23@gmial.com</a></p>
                <p>Dirección:San Carlos, Costa Rica</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<!-- /Contact-Us -->
<!-- Contact-Form -->   
<section class="contact-form slideanim">
    <h3 class="text-center">Contact Form</h3>
    <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form role="form">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Email Address</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                            <label>Message</label>
                            <textarea class="form-control" rows="6"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" href="#" class="btn btn-lg btn-outline">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>  
@stop