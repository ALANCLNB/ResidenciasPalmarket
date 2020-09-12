@extends('dashboard.dash')





@section('sidebar')

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


