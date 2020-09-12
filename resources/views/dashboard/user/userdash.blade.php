@extends('dashboard.dash')




@section('user-dash')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      PROMOCIONES
    </div>

  

    <!-- Nav Item - OFERTAS -->
    <li class="nav-item">
      <a class="nav-link" href="#usuarios">
        <i class="fas fa-fw fa-tags"></i>
        <span>Ofertas</span></a>
    </li>

    <!-- Nav Item - CUPONES -->
    <li class="nav-item">
      <a class="nav-link" href="#prod">
        <i class="fas fa-fw fa fa-ticket"></i>
        <span>Cupones</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


@endsection


@section('foto')
<div>
    <img class="w-100 h-100" id="imgPdash" src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" alt="">
  </div>
@endsection





@section('ofertas')
    
@endsection