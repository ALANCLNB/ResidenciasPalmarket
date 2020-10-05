<!DOCTYPE html>
<html lang="en">

<head>
  {{-- CROPPIE --}}
@yield('head')
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""> 

  <title>Dashboard</title>
  <link rel="icon" type="image/x-icon" href="{{asset('/principal-archivos/assets/img/logos/palmarketlogo2.png')}}" />
  <!-- Custom fonts for this template-->
  {{-- <link href="'https://fontawesome.com/releases/v5.10.0/css/all.css'" rel="stylesheet" type="text/css"> --}}
  <script src="https://kit.fontawesome.com/f37ec6fd07.js" crossorigin="anonymous"></script>
  <!-- Custom styles for this template-->
  <link href="{{asset('/dashboard-archivos/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('/dashboard-archivos/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{ asset('css/imgareaselect-default.css') }}" /> --}}






</head>



<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" >

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
        <img class=""  src="{{asset('/principal-archivos/assets/img/logos/palmarketlogoblanco.png')}}" alt="" style="max-height: 40px; max-width:40px;">
        </div>
        <div class="sidebar-brand-text mx-3">Superettes Palmarket</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/dash">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Principal</span></a>
      </li>


      {{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
      {{-- MOSTRAR LAS OPCIONES HABILITADAS PARA EL ADMIN segun rango--}}
      
     

      @if (Auth::user()->estado == 1)
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Gestion
      </div>
    @endif

  <!-- Nav Item - Usuarios Collapse Menu -->
   @if (Auth::user()->rol == 1 && Auth::user()->estado == 1)
       
   
  <li class="nav-item active">
    <a class="nav-link" href="/dash/admin/usuarios">
      <i class="fas fa-fw fa-users"></i>
      <span>Usuarios</span></a>
  </li>


  <!-- Nav Item - Productos Collapse Menu -->
  <li class="nav-item active">
    <a class="nav-link" href="/dash/admin/productos">
      <i class="fas fa-fw fa-shopping-cart"></i>
      <span>Productos</span></a>
  </li>

  @endif

  @if (Auth::user()->estado == 1)
      {{-- Nav Item  - Quejas y sugerencias --}}
      <li class="nav-item active">
        <a class="nav-link" href="/dash/admin/qys">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Quejas y Sugerencias</span></a>
      </li>
  @endif

  

@if (Auth::user()->rol == 1 && Auth::user()->estado == 1)
{{-- Nav Item  - Categorias --}}
<li class="nav-item active">
  <a class="nav-link" href="/dash/admin/categorias">
    <i class="fas fa-fw fa-stream"></i>
    <span>Categorias</span></a>
</li>


{{-- Nav Item  - Roles --}}
<li class="nav-item active">
  <a class="nav-link" href="/dash/admin/roles">
    <i class="fas fa-fw fa-user-tag"></i>
    <span>Roles</span></a>
</li>

{{-- Nav Item  - Sucursales --}}
<li class="nav-item active">
  <a class="nav-link" href="/dash/admin/sucursales">
    <i class="fas fa-fw fa-store"></i>
    <span>Sucursales</span></a>
</li>


@endif






@if (Auth::user()->estado == 1)
    

 <!-- Divider -->
 <hr class="sidebar-divider">

 <!-- Heading -->
 <div class="sidebar-heading">
   PROMOCIONES
 </div>



{{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
      {{-- MOSTRAR LAS OPCIONES HABILITADAS PARA EL usuario --}}
      
      
   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Heading -->
   

 

   <!-- Nav Item - OFERTAS -->
   <li class="nav-item">
     <a class="nav-link" href="/dash/admin/ofertasimg">
       <i class="fas fa-fw fa-tags"></i>
       <span>Ofertas Imagenes</span></a>
   </li>

  <!-- Nav Item - OFERTAS -->
  <li class="nav-item">
    <a class="nav-link" href="/dash/admin/ofertaspdf">
      <i class="fas fa-fw fa-tags"></i>
      <span>Ofertas PDF</span></a>
  </li>


  
   <!-- Nav Item - CUPONES -->
   <li class="nav-item">
     <a class="nav-link" href="/dash/admin/cupones">
       <i class="fas fa-fw fa fa-ticket"></i>
       <span>Cupones</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
     <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

   @endif  

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> --}}

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            {{-- <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a> --}}
              <!-- Dropdown - Messages -->
              {{-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li> --}}

            


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size: 1.6rem">{{ Auth::user()->nombre }}</span>
                <img class="img-profile rounded-circle" src="https://gaminguardian.com/wp-content/uploads/2020/03/kanojo-okarishimasu.png" >
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a> --}}


                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" id="">

          <!-- Page Heading -->
          {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 w-100">Principal</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div> --}}

          <!-- Content Row -->
          <div class="row h-50" >







{{-- ---------------------------TABLA PRODUCTOS----------------------------------- --}}

{{-- @yield('subir-ofertas') --}}
{{-- @yield('tabla-user') --}}
{{-- @yield('tabla-qys') --}}


<!-- Begin Page Content -->
<div class="container-fluid">
 
@yield('principal')
@yield('sucursal')
@yield('productos')
@yield('usuarios')


@yield('qysadmin')

@yield('qysuser')

@yield('ofertasimg')
@yield('ofertaspdf')

@yield('cupones')
@yield('categorias')
@yield('roles')

  


  </div>
  <!-- /.container-fluid -->

            {{-- <table class="table h-50">

                <thead class="thead-dark">

                  <tr class="text-center">
                    <th scope="col">E-mail</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Nivel</th>
                  </tr>

                </thead>
            
                        <tbody>
                            @for ($i=0; $i<50; $i++)
                        
                            <tr class="text-center">
                                <td> {{ $i }}</td>
                                <td> {{ $i }}</td>
                                <td> {{ $i }}</td>
                                <td> {{ $i }}</td>
                            </tr>  
                
                        
                        @endfor
                        </tbody>
              </table> --}}
              



          </div>

          <!-- Content Row -->

          <div class="row">

          </div>

          <!-- Content Row -->
          <div class="row">

          </div>

        </div>
        <!-- /.container-fluid -->



        
<!-- Begin Page Content -->

  <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>



  
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('/dashboard-archivos/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/dashboard-archivos/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('/dashboard-archivos/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('/dashboard-archivos/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  {{-- <script src="{{asset('/dashboard-archivos/vendor/chart.js/Chart.min.js')}}"></script> --}}

  <!-- Page level custom scripts -->
  {{-- <script src="{{asset('/dashboard-archivos/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('/dashboard-archivos/js/demo/chart-pie-demo.js')}}"></script> --}}


  <!-- Page level plugins -->
  <script src="{{asset('/dashboard-archivos/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('/dashboard-archivos/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  {{-- <script src="{{asset('/dashboard-archivos/vendor/datatables/jquery.dataTables.js')}}"></script> --}}
  <!-- Page level custom scripts -->
  <script src="{{asset('/dashboard-archivos/js/demo/datatables-demo.js')}}"></script>


  
  @yield('scripts')

  

</body>

</html>
