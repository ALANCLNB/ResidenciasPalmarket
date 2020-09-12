@extends('dashboard.dash')




@section('admin-dash')
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Gestion
  </div>

  <!-- Nav Item - Usuarios Collapse Menu -->
   
  <li class="nav-item active">
    <a class="nav-link" href="/dash/admin/user">
      <i class="fas fa-fw fa-users"></i>
      <span>Usuarios</span></a>
  </li>


  <!-- Nav Item - Productos Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-shopping-cart"></i>
      <span>Productos</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">

        <h6 class="collapse-header">Opciones:</h6>
        <a class="collapse-item" href="#">Agregar</a>
        <a class="collapse-item" href="#">Eliminar</a>
        <a class="collapse-item" href="#">Modificar</a>
      </div>
    </div>
  </li>

{{-- Nav Item  - Quejas y sugerencias --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQys" aria-expanded="true" aria-controls="collapseQys">
      <i class="fas fa-fw fa-file-alt"></i>
      <span>Quejas y sugerencias</span>
    </a>
    <div id="collapseQys" class="collapse" aria-labelledby="collapseQys" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">

        <h6 class="collapse-header">Opciones:</h6>
        <a class="collapse-item" href="#">Quejas</a>
        <a class="collapse-item" href="#">Sujerencias</a>
        <a class="collapse-item" href="#">Presentar</a>

      </div>
    </div>
  </li>
 <!-- Divider -->
 <hr class="sidebar-divider">

 <!-- Heading -->
 <div class="sidebar-heading">
   PROMOCIONES
 </div>



 <!-- Nav Item - OFERTAS -->
 <li class="nav-item">
   <a class="nav-link" href="">
     <i class="fas fa-fw fa-tags"></i>
     <span>Ofertas</span></a>
 </li>

@endsection











@section('tabla-user')
<div class="container-fluid">
 

    {{-- <div>
      <img class="w-100 h-100" id="imgPdash" src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" alt="">
    </div> --}}
    
    
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
        <p class="mb-4">.</p>
       
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>otro</th>
                </thead>
    
                <tfoot>
                    <th>ID</th>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>otro</th>
                </tfoot>
    
                {{-- CAMPOS DE PRUEBA --}}
              <tr>
                <td>1</td>
                <td>aorus@gmai.com</td>
                <td>Juan</td>
                <td>Solis</td>
                <td>25</td>

                <td>
                    <a href="" class="btn btn-info boton"><i class="fa fa-edit"></i></a>
        
            
                    <button class="btn btn-danger boton"><i class="fa fa-trash"></i></button>
                    
                </td>



              </tr>
              <tr>
                <td>2</td>
                <td>alfa@gmai.com</td>
                <td>Marco</td>
                <td>Salas</td>
                <td>31</td>
                <td>
                    
                        <a href="" class="btn btn-info boton"><i class="fa fa-edit"></i></a>
            
                
                        <button class="btn btn-danger boton"><i class="fa fa-trash"></i></button>
                        
                    
                </td>
              </tr>

              <tr>
                <td>3</td>
                <td>pubg@gmai.com</td>
                <td>Luis</td>
                <td>Romero</td>
                <td>19</td>
                <td>

                    
                        <a href="" class="btn btn-info boton"><i class="fa fa-edit"></i></a>
            
                
                        <button class="btn btn-danger boton"><i class="fa fa-trash"></i></button>
                        
                    
                </td>
              </tr>

              <tr>
                <td>4</td>
                <td>amd@gmai.com</td>
                <td>Lisa</td>
                <td>Su</td>
                <td>40</td>
                <td>

                    
                        <a href="" class="btn btn-info boton"><i class="fa fa-edit"></i></a>
            
                
                        <button class="btn btn-danger boton"><i class="fa fa-trash"></i></button>
                        
                    
                </td>
              </tr>

              <tr>
                <td>5</td>
                <td>eagle@gmai.com</td>
                <td>Brisa</td>
                <td>Romero</td>
                <td>21</td>
                <td>

                   
                        <a href="" class="btn btn-info boton"><i class="fa fa-edit"></i></a>
            
                
                        <button class="btn btn-danger boton"><i class="fa fa-trash"></i></button>
                        
                    
                </td>
              </tr>

              <tr>
                <td>6</td>
                <td>pencil@gmai.com</td>
                <td>Bic</td>
                <td>Vapo</td>
                <td>42</td>
                <td>

                 
                        <a href="" class="btn btn-info boton"><i class="fa fa-edit"></i></a>
            
                
                        <button class="btn btn-danger boton"><i class="fa fa-trash"></i></button>
                        
                    
                </td>
              </tr>
              
              
                    
    
    
                
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
    
      </div>
@endsection





@section('tabla-prod')
<h1 class="h3 mb-2 text-gray-800">Productos</h1>
<p class="mb-4">fjkldflkfjlkdfjlkdsfjlkdsfjsl.</p>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio Actual</th>
            <th>Cantidad</th>
            <th>nada1</th>
            <th>nada2</th>
        </thead>

        <tfoot>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio Actual</th>
            <th>Cantidad</th>
            <th>nada1</th>
            <th>nada2</th>
        </tfoot>

        {{-- CAMPOS DE PRUEBA --}}
      <tr>
        <td>Shou Itou</td>
        <td>Regional Marketing</td>
        <td>Tokyo</td>
        <td>20</td>
        <td>2011/08/14</td>
        <td>$163,000</td>
      </tr>
      <tr>
        <td>Michelle House</td>
        <td>Integration Specialist</td>
        <td>Sidney</td>
        <td>37</td>
        <td>2011/06/02</td>
        <td>$95,400</td>
      </tr>
      <tr>
        <td>Suki Burks</td>
        <td>Developer</td>
        <td>London</td>
        <td>53</td>
        <td>2009/10/22</td>
        <td>$114,500</td>
      </tr>
      <tr>
        <td>Prescott Bartlett</td>
        <td>Technical Author</td>
        <td>London</td>
        <td>27</td>
        <td>2011/05/07</td>
        <td>$145,000</td>
      </tr>
      <tr>
        <td>Gavin Cortez</td>
        <td>Team Leader</td>
        <td>San Francisco</td>
        <td>22</td>
        <td>2008/10/26</td>
        <td>$235,500</td>
      </tr>
      <tr>
        <td>Martena Mccray</td>
        <td>Post-Sales support</td>
        <td>Edinburgh</td>
        <td>46</td>
        <td>2011/03/09</td>
        <td>$324,050</td>
      </tr>
      <tr>
        <td>Unity Butler</td>
        <td>Marketing Designer</td>
        <td>San Francisco</td>
        <td>47</td>
        <td>2009/12/09</td>
        <td>$85,675</td>
      </tr>
      <tr>
        <td>Howard Hatfield</td>
        <td>Office Manager</td>
        <td>San Francisco</td>
        <td>51</td>
        <td>2008/12/16</td>
        <td>$164,500</td>
      </tr>
      <tr>
        <td>Hope Fuentes</td>
        <td>Secretary</td>
        <td>San Francisco</td>
        <td>41</td>
        <td>2010/02/12</td>
        <td>$109,850</td>
      </tr>
      <tr>
        <td>Vivian Harrell</td>
        <td>Financial Controller</td>
        <td>San Francisco</td>
        <td>62</td>
        <td>2009/02/14</td>
        <td>$452,500</td>
      </tr>
      <tr>
        <td>Timothy Mooney</td>
        <td>Office Manager</td>
        <td>London</td>
        <td>37</td>
        <td>2008/12/11</td>
        <td>$136,200</td>
      </tr>
      <tr>
        <td>Jackson Bradshaw</td>
        <td>Director</td>
        <td>New York</td>
        <td>65</td>
        <td>2008/09/26</td>
        <td>$645,750</td>
      </tr>
      <tr>
        <td>Olivia Liang</td>
        <td>Support Engineer</td>
        <td>Singapore</td>
        <td>64</td>
        <td>2011/02/03</td>
        <td>$234,500</td>
      </tr>
      <tr>
        <td>Bruno Nash</td>
        <td>Software Engineer</td>
        <td>London</td>
        <td>38</td>
        <td>2011/05/03</td>
        <td>$163,500</td>
      </tr>
      <tr>
        <td>Sakura Yamamoto</td>
        <td>Support Engineer</td>
        <td>Tokyo</td>
        <td>37</td>
        <td>2009/08/19</td>
        <td>$139,575</td>
      </tr>
      <tr>
        <td>Thor Walton</td>
        <td>Developer</td>
        <td>New York</td>
        <td>61</td>
        <td>2013/08/11</td>
        <td>$98,540</td>
      </tr>
      <tr>
        <td>Finn Camacho</td>
        <td>Support Engineer</td>
        <td>San Francisco</td>
        <td>47</td>
        <td>2009/07/07</td>
        <td>$87,500</td>
      </tr>
      <tr>
        <td>Serge Baldwin</td>
        <td>Data Coordinator</td>
        <td>Singapore</td>
        <td>64</td>
        <td>2012/04/09</td>
        <td>$138,575</td>
      </tr>
      <tr>
        <td>Zenaida Frank</td>
        <td>Software Engineer</td>
        <td>New York</td>
        <td>63</td>
        <td>2010/01/04</td>
        <td>$125,250</td>
      </tr>
      
            


        
         
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection


@section('tabla-qys')
<div class="container-fluid">
 

    {{-- <div>
      <img class="w-100 h-100" id="imgPdash" src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" alt="">
    </div> --}}
    
    
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Quejas y sugerencias</h1>
        <p class="mb-4">Rojo: Queja, Azul: Sugerencia.</p>
       
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>E-mail</th>
                    <th>Contenido</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                </thead>
    
                <tfoot>
                    <th>ID</th>
                    <th>E-mail</th>
                    <th>Contenido</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                </tfoot>
    
                {{-- CAMPOS DE PRUEBA --}}
              <tr>
                <td>20</td>
                <td>aorus@gmai.com</td>
                <td>Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                </td>
                <td>
                    <button class="btn btn-danger boton">Responder</button>                   
                </td>
                <td>2011/08/14</td>
                <td>Arboledas</td>

              </tr>
              <tr>
                <td>21</td>
                <td>aorus@gmai.com</td>
                <td>Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                </td>
                <td>
                    <button class="btn btn-danger boton">Responder</button>                   
                </td>
                <td>2011/08/14</td>
                <td>Pueblo</td>

              </tr>

              <tr>
                <td>22</td>
                <td>aorus@gmai.com</td>
                <td>Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                </td>
                <td>
                    <button class="btn btn-danger boton">Responder</button>                   
                </td>
                <td>2011/08/14</td>
                <td>Lagunas</td>

              </tr>

              <tr>
                <td>23</td>
                <td>aorus@gmai.com</td>
                <td>Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                </td>
                <td>
                    <a href="" class="btn btn-info boton">Responder</a>                 
                </td>
                <td>2011/08/14</td>
                <td>Arboledas</td>

              </tr>

              <tr>
                <td>24</td>
                <td>aorus@gmai.com</td>
                <td>Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                    Fall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on MultigamestationFall Guys de vuelta por el Intento de conseguir La corona vengan y disfruten de este Jueguito . Follow Me on Multigamestation
                </td>
                <td>
                    <a href="" class="btn btn-info boton">Responder</a>                
                </td>
                <td>2011/08/14</td>
                <td>Arboledas</td>

              </tr>
              
              
              
                    
    
    
                
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
    
      </div>
@endsection






@section('subir-ofertas')
    <div class="col-sm-12 col-md-8 col-lg-8    ml-auto mr-auto mt-auto mb-auto">
      
        @csrf


<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-8 form-group" >
        <label class="ml-2">Nombre</label>
        <input class= "form-control " type="text" name="nombre" value="{{ old('nombre') }} "  placeholder="Nombre de la rutina">
    </div>

    {{-- <div class="col-sm-12 col-md-4 col-lg-4 form-group" >
        <label class="ml-2">Nivel de suscripción</label>
        <select class="custom-select " name="nivelsuscripcion">

            <option value="0" >Gratis</option>
            <option value="1" >Principiante</option>
            <option value="2">Intermedio</option>
            <option value="3">Experto</option>

        </select>
    </div> --}}
    
    {{-- <input type="hidden"  name="id_user" value="{{ Auth::user()->id }} "> --}}

    


</div>
    
<div class="col-sm-12 col-md-4 col-lg-4 " >
    <label class="ml-2">Imagen</label> 
    <input class= "form-control-file " type="file" name="imagen" value="" accept="image/*" placeholder="Imagen" style="z-index: 50; ">
</div>

    <button type="submit" id="btnSubirPDF" class="btn btn-outline-success" style="margin-top: 30px;">Guardar</button>

    </div>

@endsection