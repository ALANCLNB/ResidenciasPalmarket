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


    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{asset('/principal-archivos/assets/img/logos/palmarketlogo.png')}}" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="/#services">Nosotros</a></strong></li>
                    <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="/#departamentos">Departamentos</a></strong></li>
                    <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="/#ofertones">Ofertas de la semana</a></strong></li>
                    <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="/#cuponzasos">Cupones</a></strong></li>
                    <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="/#contact">Contacto</a></strong></li>
                   
                   
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
                            
                            <a class="btn btn-primary mr-auto ml-auto mt-2 w-100" href="/cart" style="text-align: center">Realizar pedido</a>

                </div>
              </li>
                                   
                    
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:#fed136" href="/login"><strong>{{ Auth::user()->nombre }}</strong></a></li>
                            {{-- <img class="img-profile rounded-circle w-4 h-4" src="https://gaminguardian.com/wp-content/uploads/2020/03/kanojo-okarishimasu.png" style="height: 50px; width: 50px;"> --}}
                    @else
                            <li class="nav-item"><strong><a class="nav-link js-scroll-trigger" href="/login">Iniciar Sesion</a></strong></li> 
                    @endif 
                    
                </ul>
            </div>
        </div>
    </nav>

    <header class="prodhead">
        <div class="container">
            <div class="prodhead-subheading">¡Menos pasos. Más barato!</div>
            <div class="prodhead-heading text-uppercase">Superettes Palmarket</div>
        </div>
    </header>



{{-- <div>
    @csrf
<form action="/products/buscar" method="GET" class="form-inline">
    <div class="input-group">
        <input class="form-control" name="search" type="search" placeholder="Buscar....." aria-label="Search" required>
        <input type="hidden" name="titulo" value="Buscador de productos">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
            
        </div>


    </div>
</form>
</div> --}}




    {{-- @foreach ($tittle as $titulo)
        <h1 class="text-center content--title">{{$titulo->descripcion}}</h1>
    @endforeach  --}}

    <h1 class="text-center content--title">{{$tittle}}</h1> 

    <div class="col-lg-6 col-md-6 col-sm-11   ml-auto mr-auto">
        @csrf
    <form action="/products/buscar" method="GET" class="form-inline">
        <div class="input-group w-100">
            <input class="form-control" name="search" type="search" placeholder="Buscar....." aria-label="Search" required>
            <input type="hidden" name="titulo" value="Buscador de productos">
            <div class="input-group-append">
                <button class="btn btn-success" style="background-color: #8cc63e" type="submit">
                    <i class="fas fa-search"></i> Buscar 
                </button>
                {{-- <a href="/products/search=" class="button">Go to Google</a> --}}
            </div>
    
    
        </div>
    </form>
    </div>



    <div class="row justify-content-center" style="margin-top: 5rem;" id="">

        

        {{-- <div class="container mr-1 ml-auto  d-none d-sm-block      col-lg-2 col-md-3 col-sm-0" style="margin-top: 2rem; background-color: PINK;"> --}}
            <div class="container mr-1 ml-auto  d-none d-sm-block      col-lg-2 col-md-3 col-sm-0" style="margin-top: 2rem;">
            <b>Categorias</b>
            <ul class="list-inline ml-3" style= "list-style-type: circle">
                    @foreach ($catego as $category)
                       <li> <a href="/products/categoria={{$category->id}}" style="color: black">{{$category->descripcion}}</a> </li>
                    @endforeach
            </ul>

        
        </div>
    {{-- <div class=" d-block ml-0 mr-auto     col-lg-7 col-md-8 col-sm-12  " style="margin-top: 3rem; float:right; background-color: green; "> --}}
        <div class=" d-block ml-0 mr-auto     col-lg-7 col-md-8 col-sm-12  " style="margin-top: 3rem; float:right; ">


    <div class="row no-gutters" style="background-color: white;">

               @foreach ($productos as $prod)
                   
                    <div class="col-lg-3 col-md-4 col-sm-12  mb-2 mt-auto home--product-item" 
                    style="background-color: white; text-align: center;  border-radius: 25px;">
                           
                    @if ($prod->oferta == '0')
                        <div class="mr-auto ml-auto" style="background:#f50808; width: 95%; height: 10%; top: 0px; left: 0px; right:0px; position: absolute;  border-radius: 25px 25px 0px 0px;">
                            <label for="" style="color: white"><strong>OFERTA</strong></label>
                        </div>
                    @endif                   




                    @if (Auth::guest())
                    <div class="form-group">
                        <div id="agregarcarrito" class="mr-auto ml-auto col-xs-12 text-center     product-item  text-center " 
                        style="width: 75%; height: 30%; top: 0px; left: 0px; right:0px; position: absolute; border-radius: 6px; top: 50px; ">
                        
                        <a href="/login" class="btn btn-primary btn-sesion-carrito">Iniciar Sesion</a> 
                        <p class="btn-sesion-carrito" style="color: #777; font-size: 15px;">Inicia sesion para añadir al carrito</p>

                    </div>
                       
                   </div>
                    @else
                              {{-- FORMULARIO PARA A;ADIR AL CARRITO --}}
                            <form  action="/products/carrito" method="POST">
                                @csrf

                                <div id="agregarcarrito" class="mr-auto ml-auto col-xs-12 text-center     product-item  text-center " 
                                    style="width: 75%; height: 30%; top: 0px; left: 0px; right:0px; position: absolute; border-radius: 6px; top: 50px; ">
                                    
                            
                            <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="id_producto" value="{{ $prod->id }}">
                            <input type="hidden" name="unidad" value="{{ $prod->embalaje }}">
                                    
                            <input id="cantidad" name="cantidad" type="text" class=" text-center cant" value="" placeholder="Cantidad"
                                        style="width: 70%; height: 50%; top: 15px; left: 10px; right:0px; position: absolute; border-radius: 8px; ">
                                        
                                        <button class="btn " id="boton-carrito" type="submit" style="">
                                            <i class="fas fa-cart-plus " style="color: #8cc63e; font-size:1.5rem; float: left;"></i>
                                        </button>  

                                    <div id="embalaje">
                                        <label for="">{{ $prod->embalaje }}</label>    
                                    </div>  

                                </div>
                            </form>
                    @endif

                   
            





                            <img src="{{asset('/img/'.$prod->imagen)}}" class="img-fluid mr-auto ml-auto border" style="width: 95%; height: 95%;   border-radius: 25px;">
                            
                            
                    <div>
                            <ul class="list-inline">
                                <li>{{$prod ->marca}}</li>
                                <li>{{$prod ->nombre}}</li>
                                <li>1 {{$prod ->embalaje}}</li>

                                @if ($prod->oferta == '0')
                                    <div class="color--green">Precio Rebajado:</div>
                                @else
                                    <div class="color--gray">Precio:</div>
                                @endif

                                <div class="row">

                                    @if ($prod->oferta == '0')
                                    
                                        <s class="mr-auto ml-auto color--gray">$ {{$prod->precio_ant}}</s>
                                    @endif
                                        <b class="mr-auto ml-auto color--green">$ {{$prod ->precio}}</b>
                                </div>
                                
                            </ul>
                    </div>
                    </div>
                @endforeach
            

            
</div>
<div class="row justify-content-center" style="margin-top: 5rem;">
{{$productos->links()}}
</div>

</div>
</div>























<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

    <script type="text/javascript">
        $(function() {
          $('#agregarcarrito').hover(function() {
            $('#cantidad').css('display', 'block');
          });
        });
    </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Contact form JS-->
<script src="{{asset('/principal-archivos/assets/mail/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('/principal-archivos/assets/mail/contact_me.js')}}"></script>
<!-- Core theme JS-->
<script src="{{asset('/principal-archivos/js/scripts.js')}}"></script>

</body>

</html>