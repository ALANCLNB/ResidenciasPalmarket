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
                                    <a class="btn btn-primary mr-auto ml-auto mt-2" href="/cart" style="text-align: center">Realizar pedido</a>
        
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




    <div class="row justify-content-center mr-auto ml-auto" style="margin-top: 5rem; width:80%" id="">

        

        <div class="table-responsive">
            <table class="table table-hover text-center" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th>Imagen</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Unidad</th>
                  <th>Precio</th>
              </thead>

                @foreach ($carrito as $item)
                    <tr>
                    <td>
                        <img class="ml-auto mr-auto" style="height: 50px; widht: 60;" src="{{ asset('img/'.$item->Image) }}" alt="">
                    </td>
                    <td>{{ $item->Producto }}</td>
                    <td>{{ $item->cantidad  }}</td>
                    <td>{{ $item->unidad  }}</td>
                    <td>$ {{ number_format($item->totalPriceQuantity,2) }}</td>
                    </tr>
                 @endforeach 
              
            
            
                  
      
      
              
               
              </tbody>
            </table>

            <div class="row justify-content-right  float-right mr-auto ml-auto">
                @foreach ($valor as $i)
                    <h5 class="text-gray">Subtotal: $ {{ number_format($val->totalPQ,2,'.', ',') }}</h5>
                @endforeach
            </div>

            <div class="row justify-content-center mr-auto ml-auto" style="margin-top: 5rem;">
                {{$carrito->links()}}
            </div>
</div>












<div class="row justify-content-center mr-auto ml-auto w-100"  id="">


    <div class="div_cart">

            <form action="" method="POST" id="formCart">

                    @csrf

                    <input type="hidden" class="form-control" name="id_user" placeholder="Usuario ID " value="{{ Auth::user()->id }}">       
                    <input type="hidden" class="form-control" name="email" placeholder="email " value="{{ Auth::user()->email}}">

                
                    <div class="row justify-content-center">
                        
                        <label for="" class="">Sucursal</label>
                    </div>
                    
                    <div class="row justify-content-center">
                    
                    
                        <select class="custom-select   col-lg-4 col-md-8 col-sm-10" name="sucursal" id="" >
                            <option selected disabled value="">Seleccionar</option>
                            
                            
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                            @endforeach
                            
                        </select>

                    </div>


                    <div class="row justify-content-center mr-auto ml-auto mt-5">
                        @foreach ($valor as $i)
                            <h5 class="text-gray">Subtotal: $ {{ number_format($val->totalPQ,2,'.', ',') }}</h5>
                        @endforeach
                    </div>

                    <div class="row justify-content-center mr-auto ml-auto mt-2">
                        
                            <h5 class="text-gray">*Margen de precio: $ {{ number_format($margenKG,2,'.', ',') }}</h5>
                        
                    </div>

                    <div class="row justify-content-center mr-auto ml-auto mt-2">
                        
                        <h5 class="text-gray">**Total aproximado: $ {{ number_format($totalAprox,2,'.', ',') }}</h5>
                    
                </div>

                    <div class="row justify-content-center mr-auto ml-auto mt-4 mb-5 text-center" >

                    {{-- <div class="col-lg-5 col-md-3 col-sm-1    ml-auto mb-auto mr-auto mt-auto"></div> --}}

                        <button type="submit" id="btnSubirPDF" class="btn btn-outline-success  col-lg-2 col-md-6 col-sm-10  float-lg-right    ml-auto mb-auto mr-auto mt-auto" 
                        style="margin-top: 30px;">Realizar pedido</button>

                    {{-- <div class="col-lg-5 col-md-3 col-sm-1    ml-auto mb-auto mr-auto mt-auto"></div> --}}

                    </div>
            </form>

            <div class="row justify-content-center mr-auto ml-auto mt- text-center w-75 color--gray">

                <p>*Los productos con la unidad de medida de KG deben tener un margen de precio de 5 pesos debido a que su pesaje no puede ser exacto, 
                    en dado caso de que el precio final no supere el margen se le devolvera su dinero.</p>

                <p>**Precio maximo a pagar, el pago final puede ser menor</p>

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