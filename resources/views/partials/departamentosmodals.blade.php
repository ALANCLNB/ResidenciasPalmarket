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

                        </div> {{-- producdepartamentoi --}}
                        


                        <div class="container d-block" style="margin-top: 3rem; background-color: aqua;">

                            {{-- @foreach ($produ as $prod) --}}
                                
                            
                            <div class="row no-gutters" style="background-color: RED; ">
                            
                                 {{-- @foreach ($productos as $prod)
                                     
                                 
                                
                                <div class="col-lg-3 col-md-4 col-sm-12        ml-auto mb-auto mr-auto mt-auto " 
                                style="margin-bottom: 0.5rem;height:300px background-color: green;">
       
                                        <img src="{{asset('/img/'.$prod->imagen)}}" class="img-fluid " style="width: 95%; height: 95%; float: left;">
                                <div>
                                        <ul class="list-inline">
                                            <li>{{$prod ->nombre}}</li>
                                            <li>{{$prod ->marca}}</li>
                                            <li>{{$prod ->precio}}</li>
                                        </ul>
                                </div>
                                </div>
                                @endforeach --}}
                                
                                </div>
                                
                            
                            
                        </div>

                        {{-- {{ $productos->links() }} --}}
                        </div> {{-- modal body --}}

                                   
                    </div>  {{-- col lg 8 --}}
                               
                                
                    
                            
                        </div>  {{-- row justify --}}
                        
                    </div> {{-- container --}}
                </div> {{-- modal content --}}
            </div>  {{-- modal dialog --}}
        </div>  {{-- modal fade --}}
   

