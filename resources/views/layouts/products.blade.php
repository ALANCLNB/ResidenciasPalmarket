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


    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav2">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{asset('/principal-archivos/assets/img/logos/palmarketlogo.png')}}" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">

                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#services">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#departamentos">Departamentos</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#ofertones">Ofertas de la semana</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#cuponzasos">Cupones</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#contact">Contacto</a></li>
                   

                       
                    
                   
                    @if (Auth::check())
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/login"><strong>{{ Auth::user()->nombre }}</strong></a></li>
                            
                    @else
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/login">Iniciar Sesion</a></li> 
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


<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown button
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" >Action</a>
      <a class="dropdown-item" >Another action</a>
      <a class="dropdown-item" >Something else here</a>
    </div>
  </div> 

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

        

        <div class="container mr-1 ml-auto  d-none d-sm-block      col-lg-2 col-md-3 col-sm-0" style="margin-top: 2rem; background-color: PINK;">
            <b>Categorias</b>
            <ul class="list-inline ml-3" style= "list-style-type: circle">
                    @foreach ($catego as $category)
                       <li> <a href="/products/categoria={{$category->id}}" style="color: black">{{$category->descripcion}}</a> </li>
                    @endforeach
            </ul>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown button
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" >Action</a>
                  <a class="dropdown-item" >Another action</a>
                  <a class="dropdown-item" >Something else here</a>
                </div>
              </div> 
        </div>
    <div class=" d-block ml-0 mr-auto     col-lg-7 col-md-8 col-sm-12  " style="margin-top: 3rem; float:right; background-color: green; ">



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





</body>

</html>