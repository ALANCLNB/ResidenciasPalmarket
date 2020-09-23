<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/principal-archivos/assets/img/logos/palmarketlogo2.png')}}" id="logoPrincipal" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>      
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('/principal-archivos/css/styles.css')}}" rel="stylesheet" />
</head>


<body>


    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
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



   
   


    <div class="row justify-content-center" style="margin-top: 5rem;" id="">
    <div class="container d-block" style="margin-top: 3rem; background-color: green;">

    <div class="row no-gutters" style="background-color: white; ">



           
                
               @foreach ($productos as $prod)
                   
                    <div class="col-lg-3 col-md-4 col-sm-12  mb-auto  mt-auto home--product-item" 
                    style="margin-bottom: 0.5rem;height:300px background-color: green; text-align: center;  border-radius: 25px;">
                           
                    @if ($prod->oferta == '0')
                        <div class="mr-auto ml-auto" style="background:#f50808; width: 95%; height: 10%; top: 0px; position: absolute;  border-radius: 25px 25px 0px 0px;">
                            <label for="" style="color: white"><strong>OFERTA</strong></label>
                        </div>
                    @endif
                    

                            <img src="{{asset('/img/'.$prod->imagen)}}" class="img-fluid mr-auto ml-auto" style="width: 95%; height: 95%;   border-radius: 25px;">
                            
                            
                    <div>
                            <ul class="list-inline">
                                <li>{{$prod ->marca}}</li>
                                <li>{{$prod ->nombre}}</li>
                                <li>1 {{$prod ->embalaje}}</li>

                                @if ($prod->oferta == '0')
                                    <div class="color--green">Precio Rebajado:</div>
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




























</body>
</html>