<!-- Modal 1-->
<div class="departamentos-modal modal fade" id="departamentosModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div> --}}
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 5rem;">
                    <div class="col-lg-8">
                        <div class="modal-body" style="height: 100%">


                            <!-- Lista de productos-->
                            <div class="productodepartamento">
                            <h2 class="text-uppercase" style="margin-top: 2.5rem;">Frutas y verduras</h2>
                            <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                            {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                            <form class="form-inline my-2 my-lg-0    col-lg-12 col-md-12 col-sm-12">
                                <div class="col-lg-2 col-md-2 col-sm-1"></div>

                                    <input class="form-control mr-sm-2   col-lg-6 col-md-6 col-sm-4"  type="search" placeholder="Busca aquí productos, marcas, etc.." aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0 col-lg-2 col-md-2 col-sm-2"  type="submit">Buscar</button>
                                
                                <div class="col-lg-2 col-md-2 col-sm-1"></div> 
                            </form>

                        </div>
                        
                        
                        {{-- <div class="container d-block" style="margin-top: 3rem;">

                            <div class="row no-gutters" >

                                @for($i=0; $i<16; $i++)
                                    <div class="col-lg-3 col-md-4 col-sm-6 fondo con ml-auto mb-auto mr-auto mt-auto " style="margin-bottom: 0.5rem; float: left;height:300px ">
                                        <img src="{{asset('/principal-archivos/assets/img/lacteos.png')}}" class="img-fluid " style="width: 95%; height: 95%; float: left;">

                                        <ul class="list-inline">
                                            <li>Nombre</li>
                                            <li>Marca</li>
                                            <li>Precio</li>
                                        </ul>
                                           
                                    </div>
                                        
                                    @endfor
                            </div>
                        </div> --}}
                        <div class="container d-block" style="margin-top: 3rem; background-color: aqua;">

                            <div class="row no-gutters" style="background-color: RED; ">
                                @for($i=0; $i<16; $i++)
                                <div class=" ml-auto mb-auto mr-auto mt-auto " style="margin-bottom: 0.5rem;height:300px background-color: green;">
       
                                        <img src="{{asset('/principal-archivos/assets/img/lacteos.png')}}" class="img-fluid " style="width: 95%; height: 95%; float: left;">
                                <div>
                                        <ul class="list-inline">
                                            <li>Nombre</li>
                                            <li>Marca</li>
                                            <li>Precio</li>
                                        </ul>
                                </div>
                                   
                                
                                </div>
                            
                            @endfor
                        </div>
                        </div>




                                    {{-- <div class="productoscontenedor" style="width: 25%;">
                                        <img class="img-fluid d-block mx-auto" src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" alt="" />
                                        <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos 
                                            deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                        <ul class="list-inline">
                                            <li>Nombre</li>
                                            <li>Marca</li>
                                            <li>Precio</li>
                                        </ul>
                                        <button class="btn btn-primary" data-dismiss="modal" type="button">
                                            <i class="fas fa-times mr-1"></i>
                                            Close Project
                                        </button>
                                    </div> --}}
                    </div>
                                {{-- Divs de productos --}}
                                
                    
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- ---------------------------------------------------------------------------------- --}}

<!-- Modal 2   CARNICERIA-->
<div class="departamentos-modal modal fade" id="departamentosModal2" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    {{-- <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div> --}}
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 5rem;">
            <div class="col-lg-8">
                <div class="modal-body">


                    <!-- Lista de productos CARNICERIA-->
                    <div class="productodepartamento">
                    <h2 class="text-uppercase" style="margin-top: 2.5rem;">Carnicería</h2>
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <form class="form-inline my-2 my-lg-0    col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-2 col-md-2 col-sm-1"></div>

                            <input class="form-control mr-sm-2   col-lg-6 col-md-6 col-sm-4"  type="search" placeholder="Busca aquí productos, marcas, etc.." aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 col-lg-2 col-md-2 col-sm-2"  type="submit">Buscar</button>
                        
                        <div class="col-lg-2 col-md-2 col-sm-1"></div> 
                    </form>

                </div>
                           
                <div class="container d-block" style="margin-top: 3rem;">

                    <div class="row no-gutters">

                        @for($i=0; $i<6; $i++)
                            <div class="col-lg-3 col-md-4 col-sm-6 fondo con ml-auto mb-auto mr-auto mt-auto" style="margin-bottom: 0.5rem;">
                                <img src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" class="img-fluid" style="width: 95%; height: 95%; float: left;">

                                <ul class="list-inline">
                                    <li>Nombre</li>
                                    <li>Marca</li>
                                    <li>Precio</li>
                                </ul>
                                    
                            </div>
                                
                            @endfor

                    </div>
                </div>

                            

            </div>
                       
                  
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


{{-- /---------------------------------------------------------------------------- --}}



<!-- Modal 3   LACTEOS-->
<div class="departamentos-modal modal fade" id="departamentosModal3" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    {{-- <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div> --}}
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 5rem;">
            <div class="col-lg-8">
                <div class="modal-body">


                    <!-- Lista de productos   LACTEOS-->
                    <div class="productodepartamento">
                    <h2 class="text-uppercase" style="margin-top: 2.5rem;">Lacteos</h2>
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <form class="form-inline my-2 my-lg-0    col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-2 col-md-2 col-sm-1"></div>

                            <input class="form-control mr-sm-2   col-lg-6 col-md-6 col-sm-4"  type="search" placeholder="Busca aquí productos, marcas, etc.." aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 col-lg-2 col-md-2 col-sm-2"  type="submit">Buscar</button>
                        
                        <div class="col-lg-2 col-md-2 col-sm-1"></div> 
                    </form>

                </div>
                           
                <div class="container d-block" style="margin-top: 3rem;">

                    <div class="row no-gutters">

                        @for($i=0; $i<6; $i++)
                            <div class="col-lg-3 col-md-4 col-sm-6 fondo con ml-auto mb-auto mr-auto mt-auto" style="margin-bottom: 0.5rem;">
                                <img src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" class="img-fluid" style="width: 95%; height: 95%; float: left;">

                                <ul class="list-inline">
                                    <li>Nombre</li>
                                    <li>Marca</li>
                                    <li>Precio</li>
                                </ul>
                                    
                            </div>
                                
                            @endfor

                    </div>
                </div>

                            

            </div>
                       
                  
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


{{-- /---------------------------------------------------------------------------- --}}

<!-- Modal 4   PANADERIA Y TORTILLERIA-->
<div class="departamentos-modal modal fade" id="departamentosModal4" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    {{-- <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div> --}}
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 5rem;">
            <div class="col-lg-8">
                <div class="modal-body">


                    <!-- Lista de productos   PANADERIA Y TORTILLERIA-->
                    <div class="productodepartamento">
                    <h2 class="text-uppercase" style="margin-top: 2.5rem;">Panadería y tortillería</h2>
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <form class="form-inline my-2 my-lg-0    col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-2 col-md-2 col-sm-1"></div>

                            <input class="form-control mr-sm-2   col-lg-6 col-md-6 col-sm-4"  type="search" placeholder="Busca aquí productos, marcas, etc.." aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 col-lg-2 col-md-2 col-sm-2"  type="submit">Buscar</button>
                        
                        <div class="col-lg-2 col-md-2 col-sm-1"></div> 
                    </form>

                </div>
                           
                <div class="container d-block" style="margin-top: 3rem;">

                    <div class="row no-gutters">

                        @for($i=0; $i<6; $i++)
                            <div class="col-lg-3 col-md-4 col-sm-6 fondo con ml-auto mb-auto mr-auto mt-auto" style="margin-bottom: 0.5rem;">
                                <img src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" class="img-fluid" style="width: 95%; height: 95%; float: left;">

                                <ul class="list-inline">
                                    <li>Nombre</li>
                                    <li>Marca</li>
                                    <li>Precio</li>
                                </ul>
                                    
                            </div>
                                
                            @endfor

                    </div>
                </div>

                            

            </div>
                       
                  
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

{{-- /---------------------------------------------------------------------------- --}}

<!-- Modal 5   HIGIENE PERSONAL Y LIMPIEZA-->
<div class="departamentos-modal modal fade" id="departamentosModal5" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    {{-- <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div> --}}
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 5rem;">
            <div class="col-lg-8">
                <div class="modal-body">


                    <!-- Lista de HIGIENE PERSONAL Y LIMPIEZA-->
                    <div class="productodepartamento">
                    <h2 class="text-uppercase" style="margin-top: 2.5rem;">Higiene personal y limpieza</h2>
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <form class="form-inline my-2 my-lg-0    col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-2 col-md-2 col-sm-1"></div>

                            <input class="form-control mr-sm-2   col-lg-6 col-md-6 col-sm-4"  type="search" placeholder="Busca aquí productos, marcas, etc.." aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 col-lg-2 col-md-2 col-sm-2"  type="submit">Buscar</button>
                        
                        <div class="col-lg-2 col-md-2 col-sm-1"></div> 
                    </form>

                </div>
                           
                <div class="container d-block" style="margin-top: 3rem;">

                    <div class="row no-gutters">

                        @for($i=0; $i<6; $i++)
                            <div class="col-lg-3 col-md-4 col-sm-6 fondo con ml-auto mb-auto mr-auto mt-auto" style="margin-bottom: 0.5rem;">
                                <img src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" class="img-fluid" style="width: 95%; height: 95%; float: left;">

                                <ul class="list-inline">
                                    <li>Nombre</li>
                                    <li>Marca</li>
                                    <li>Precio</li>
                                </ul>
                                    
                            </div>
                                
                            @endfor

                    </div>
                </div>

                            

            </div>
                       
                  
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


{{-- /---------------------------------------------------------------------------- --}}
<!-- Modal 6    ABARROTES Y DEMAS-->
<div class="departamentos-modal modal fade" id="departamentosModal6" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    {{-- <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div> --}}
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 5rem;">
            <div class="col-lg-8">
                <div class="modal-body">


                    <!-- Lista de ABARROTES Y DEMAS-->
                    <div class="productodepartamento">
                    <h2 class="text-uppercase" style="margin-top: 2.5rem;">Abarrotes y demás</h2>
                    <div class="close-modal" data-dismiss="modal"><img src="{{asset('/principal-archivos/assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <form class="form-inline my-2 my-lg-0    col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-2 col-md-2 col-sm-1"></div>

                            <input class="form-control mr-sm-2   col-lg-6 col-md-6 col-sm-4"  type="search" placeholder="Busca aquí productos, marcas, etc.." aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 col-lg-2 col-md-2 col-sm-2"  type="submit">Buscar</button>
                        
                        <div class="col-lg-2 col-md-2 col-sm-1"></div> 
                    </form>

                </div>
                           
                <div class="container d-block" style="margin-top: 3rem;">

                    <div class="row no-gutters">

                        @for($i=0; $i<6; $i++)
                            <div class="col-lg-3 col-md-4 col-sm-6 fondo con ml-auto mb-auto mr-auto mt-auto" style="margin-bottom: 0.5rem;">
                                <img src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" class="img-fluid" style="width: 95%; height: 95%; float: left;">

                                <ul class="list-inline">
                                    <li>Nombre</li>
                                    <li>Marca</li>
                                    <li>Precio</li>
                                </ul>
                                    
                            </div>
                                
                            @endfor

                    </div>
                </div>

                            

            </div>
                       
                  
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


{{-- /---------------------------------------------------------------------------- --}}