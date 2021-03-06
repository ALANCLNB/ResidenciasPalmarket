<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Superettes Palmarket</title>
        <link rel="icon" type="image/x-icon" href="{{asset('/principal-archivos/assets/img/logos/palmarketlogo2.png')}}" id="logoPrincipal" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        {{-- PDF reader --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.3.200/pdf_viewer.js"></script> --}}
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('/principal-archivos/css/styles.css')}}" rel="stylesheet" />

    

    </head>
    <body id="page-top">

        <div class="centrado" id="onload">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{asset('/principal-archivos/assets/img/logos/palmarketlogo.png')}}" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menú
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="#services">Nosotros</a></strong></li>
                        <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="#departamentos">Departamentos</a></strong></li>
                        <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="#ofertones">Ofertas de la semana</a></strong></li>
                        <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="#cuponzasos">Cupones</a></strong></li>
                        <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="#contact">Contacto</a></strong></li>
                        
                        @if (Auth::check())
                      <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cart-arrow-down"></i>
                  <!-- Counter - Alerts -->
            

                  <span class="badge badge-danger badge-counter">{{ $count }}</span> 

                </a>
                <!-- Dropdown - Alerts -->

                <div class="col-lg-6 col-md-6  col-sm-12  car-prod   dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Productos
                  </h6>


                  @foreach ($carrito as $item)

                  @if ($item->id_user == Auth::user()->id)
                  
                  <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle ">
                                {{-- <i class="fas fa-shopping-basket" style="color: #8cc63e"></i> --}}
                            <img src="{{ asset('img/'.$item->Image) }}" alt="" style="height: 30px; width:40px;">
                            </div>
                        </div>

                        <div>
                        <div class="text-truncate">{{ $item->Producto }}</div>
                        
                        <div class="row">
                            
                                <div class="text-truncate color--gray">{{ $item->cantidad }} - {{ $item->unidad }}</div>
                                <b class="text-cant-precio color--green">$ {{ number_format($item->totalPriceQuantity,2) }}</b>  
                                        
                                {{-- <div class="text-cant-precio color--gray">$ {{ $item->totalPriceQuantity }}</div>
                                <div class="text-cant-precio color--gray">X</div> --}}



                                <form method="POST" action="{{ url("/products/carrito/{$item->id}") }}">
                                    @csrf
                                    @method('DELETE')
                               
                                   
                                    <button class="btn text-elim-carrito" type="submit">
                                        <i class="fa fa-trash "></i></button>

                                  </form>


                                         
                        </div>
                        {{-- <span class="font-weight-bold text-truncate" style="max-width: 10rem;">A new monthly report is ready to download!</span> --}}
                        </div>

                  </a>
                  @endif
                  @endforeach

                           @foreach ($valor as $val)
                           @endforeach       
                            <a class="dropdown-item text-center small text-gray-500 preciotot">Precio total: $ {{ number_format($val->totalPQ,2,'.', ',') }}</a>
                        
                            <a class="btn btn-primary mr-auto ml-auto mt-2 w-100" href="/cart" style="text-align: center;">Realizar pedido</a>
                            
                </div>
              </li>
                                   
                    
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:#fed136" href="/login"><strong>{{ Auth::user()->nombre }}</strong></a></li>
                            {{-- <img class="img-profile rounded-circle w-4 h-4" src="https://gaminguardian.com/wp-content/uploads/2020/03/kanojo-okarishimasu.png" style="height: 50px; width: 50px;"> --}}
                    @else
                            <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="/login">Iniciar Sesión</a></strong></li> 
                    @endif 
                                                                             
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">¡Menos pasos. Más barato!</div>
                <div class="masthead-heading text-uppercase" style="font-size: 3rem">Superettes Palmarket</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Conocenos</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nosotros</h2>
                    <h3 class="section-subheading text-muted">Siempre buscando brindar el mejor servicio.</h3>
                </div>
                <div class="row text-center">

                
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-tags fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">La mejor calidad a buenos precios</h4>
                        <p class="text-muted">Siempre estamos en la búsqueda  de ofrecer los mejores productos al mejor precio.</p>
                    </div>
                  
              

                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-map-marker-alt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Cerca de ti</h4>
                        <p class="text-muted">Contamos con varias sucursales a tu disposicion abiertas los 7 dias de la semana.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Calidad y confianza</h4>
                        <p class="text-muted">Siéntete con la confianza de que siempre llevaras los productos con la mejor calidad.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCION:   DEPARTAMENTOS-->
        <section class="page-section bg-light" id="departamentos">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase" style="font-size: 1.5rem">Departamentos</h2>
                    <h3 class="section-subheading text-muted">Consulta precios y ofertas.</h3>
                </div>
                <div class="row">
                        

                    {{-- DIVICION DE DEPARTAMENTOS--}}
                    @foreach ($categoria as $item)
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="departamentos-item">
                            <a class="departamentos-link"  href="/products/categoria={{$item->id}}">
                                    <div class="departamentos-hover">
                                        <div class="departamentos-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="{{asset('/img/categorias/'.$item->imagen)}}" alt="" />
                                </a>
                                <div class="departamentos-caption">
                                    <div class="departamentos-caption-heading">{{$item->descripcion}}</div>
                                    {{-- <div class="departamentos-caption-subheading text-muted">Illustration</div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                   
                </div>
            </div>
        </section>


        {{-- Aqui va la seccion de ofertas en PDF --}}
        <section class="page-section h-lg-20" id="ofertones">
            
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Ofertas de la semana</h2>
                    <h3 class="section-subheading text-muted">Descubre las ofertas de esta semana que tenemos para ti en Superettes Palmarket.</h3>
                </div>

                
                {{-- lector PDF ofertas --}}
                
                
                    <embed class="col-lg-6 col-md-10 col-sm-12    ml-auto mb-auto mr-auto mt-auto d-lg-block pdf" src="{{ asset('/ofertas/pdf/'.$pdf) }}" id="pdf" />
               
            
                        <div>
                       <strong><a class="btn btn-primary" style="margin-top: 25px" target="_blank" href="{{ asset('/ofertas/pdf/'.$pdf) }}">Ver ofertas</a></strong> 
                    </div>

        </section>


        
        {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
        <section class="page-section" id="">
        
                {{-- Carrusel de imagenes --}}
                

                
                  <div id="carouselExampleIndicators" class="carousel slide carru col-lg-10" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        
                      @foreach ($carrusel as $imgs2)                      
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->iteration }}"></li>
                        @endforeach
                    </ol>


                    <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="2000">
                            <img src="{{asset('/ofertas/img/default/oferta.webp')}}" class="d-block w-100" alt="...">
                        </div>
                        @foreach ($carrusel as $imgs)

                            <div class="carousel-item">
                                <img src="{{asset('/ofertas/img/'.$imgs->nombre)}}" class="d-block w-100" alt="...">
                            </div>

                        @endforeach

                    
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                {{-- Fin Carrusel de imagenes --}}

           
        </section>

       

        <section class="page-section bg-light" id="cuponzasos">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Cupones</h2>
                    <h3 class="section-subheading text-muted">Presenta este cupón  en caja y recibe tu descuento.</h3>
                

                <div class="row  col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" >


                    <div class="col-lg-2 col-md-1 col-sm-0    ml-auto mb-auto mr-auto mt-auto"></div>
                        
                    {{-- Div verde de cupones --}}
                    <div class="col-lg-8 col-md-10 col-sm-12    ml-auto mb-auto mr-auto mt-auto" id="cupones">
                        
                        @foreach ($cupones as $cupon)
                            <h3 id="codigocupon">{{$cupon->codigo}}</h2>
                                <br>
                            <label for="" id="descipcioncupon">{{$cupon->descripcion}}</label>
                         @endforeach
                            
                    </div>
                        
                        {{-- -------------------------- --}}
                    <div class="col-lg-2 col-md-1 col-sm-0    ml-auto mb-auto mr-auto mt-auto"></div>

                </div>

            </div>

            </div>
        </section>




        <!-- Marcas o proveedores-->
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 my-3 ml-auto mr-auto">
                        <a href=""><img class="img-fluid d-block mx-auto ml-auto mr-auto" src="{{asset('/principal-archivos/assets/img/logos/cocalogo.png')}}" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3 ml-auto mr-auto">
                        <a href=""><img class="img-fluid d-block mx-auto ml-auto mr-auto" src="{{asset('/principal-archivos/assets/img/logos/lalalogo.png')}}" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3 ml-auto mr-auto">
                        <a href=""><img class="img-fluid d-block mx-auto ml-auto mr-auto" src="{{asset('/principal-archivos/assets/img/logos/sigmalogo.png')}}" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3 ml-auto mr-auto">
                        <a href=""><img class="img-fluid d-block mx-auto ml-auto mr-auto" src="{{asset('/principal-archivos/assets/img/logos/costenalogo.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>



        <!-- Contact-->
        <section class="page-section" id="contact">
            
            <div class="container">

            <h2 class="section-heading text-uppercase text-center">Contacto</h2>
    <!--The div element for the map -->
    <div class="row">

    <div id="carouselExampleControls" class="carousel slide col-sm-10 col-md-6 col-lg-6" data-ride="carousel" >
        <div class="carousel-inner">

            <div class="carousel-item active map">

                @foreach ($prim as $f)
                    <iframe src={{ $f->direccion }} 
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="w-100 h-100 map"></iframe>
                    <input type="text" value="{{ $f->nombre }} ">
                 @endforeach

            </div>
            
          
            @foreach ($next as $n)
                <div class="carousel-item map">
                    
                        <iframe src={{ $n->direccion }}
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="w-100 h-100 map"></iframe>
                    
                </div>
            @endforeach
            
            <a class="carousel-map-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>

            <a class="carousel-map-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="right: 0">
                <span class="carousel-control-next-icon" aria-hidden="true" ></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
        
    </div> 


    <div>
        <div>
            <a class="btn btn-light btn-social m-2" href="https://www.facebook.com/SuperettesPalmarket"><i class="fab fa-facebook-f"></i></a>
            <label class="labredes" for="">Facebook</label>
        </div>

        <div>
            <a class="btn btn-light btn-social m-2"><i class="fas fa-phone"></i></a>
            <label class="labredes" for="">636-101-1113</label>
        </div>

        <div>
            <a class="btn btn-light btn-social m-2" href="mailto:palmarket.info@gmail.com"><i class="fas fa-envelope"></i></a>
            <label class="labredes" for="">palmarket.info@gmail.com</label>
        </div>
      
    </div>

    
    </div>
        </section>

        
        <!-- Footer-->
        @include('partials.footerprincipal')







        <!-- departamentos Modals-->
        @include('partials.departamentosmodals') 
        
     






        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="{{asset('/principal-archivos/assets/mail/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('/principal-archivos/assets/mail/contact_me.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('/principal-archivos/js/scripts.js')}}"></script>

        {{-- SCRIPTS PARA EL LECTOR PDF --}}
        {{-- <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <script src="js/main.js"></script> --}}


    </body>


</html>
