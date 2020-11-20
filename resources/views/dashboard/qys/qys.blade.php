@extends('dashboard.dash')




@section('qysadmin')
@if (Auth::user()->rol == 1 || Auth::user()->rol == 2)

<div class="container-fluid">
 

    {{-- <div>
      <img class="w-100 h-100" id="imgPdash" src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" alt="">
    </div> --}}
    
    
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Quejas y sugerencias</h1>
        <p class="mb-4">Rojo: Queja, Azul: Sugerencia.</p>
       
        

        {{-- Alertas Correcto --}}
        <div class="row">
          @if ($message = Session::get('Eliminado'))
              <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
                  <h5>Correcto</h5>
              <span>{{ $message }}</span>   
              </div>    

          @endif
          
          @if ($message = Session::get('ErrorInsert'))
          <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
              <h5>Errores:</h5>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>                    
                  @endforeach    
              </ul>    
          </div>    
    
      @endif
        </div>
    


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
                    @if (Auth::user()->rol == 1)
                    <th>Acciones</th>
                    @endif
                </thead>
    
                <tfoot>
                    <th>ID</th>
                    <th>E-mail</th>
                    <th>Contenido</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Sucursal</th>
                    @if (Auth::user()->rol == 1)
                    <th>Acciones</th>
                    @endif
                </tfoot>
    
                {{-- CAMPOS --}}
                @foreach ($qysug as $qys)

                    <tr>
                      <td>{{ $qys ->id }}</td>
                      <td>{{ $qys ->email }}</td>
                      <td>{{ $qys ->contenido }}</td>
                       
                       
                        @if ($qys ->tipo=='1')
                                <td>
                                  <button class="btn btn-danger boton">Queja</button>                   
                              </td> 
                        @else     
                              <td>
                                <button class="btn btn-info boton">Sugerencia</button>                   
                              </td>
                        @endif 
                        
                      </td>

                      <td>{{ $qys ->created_at }}</td>
                      <td>{{ $qys ->Sucursal }}</td>
                      {{-- @if ($qys ->sucursal =='1')
                      <td>Arboledas</td>

                      @elseif($qys ->sucursal =='2')
                      <td>Lagunas</td>
                      
                      @elseif($qys ->sucursal =='3')
                      <td>Pueblo</td>

                      @elseif($qys ->sucursal =='4')
                      <td>Reforma</td>

                      @elseif($qys ->sucursal =='5')
                      <td>Zapata</td>

                      @endif --}}

                      @if (Auth::user()->rol == 1)                    
                          <td>
                              
                                  {{-- <a href="" class="btn btn-info "><i class="fa fa-edit"></i></a> --}}
                      

                          <button class="btn btn-danger  btnEliminar" data-id="{{ $qys->id }}" data-toggle="modal" data-target="#modalEliminar">
                            <i class="fa fa-trash"></i></button>
                                      
                                      <form action="{{ url('/dash/admin/qys', ['id'=>$qys->id] ) }}" method="POST" id="formEli_{{ $qys->id }}">
                                          @csrf
                                          <input type="hidden" name="id" value="{{ $qys->id }}">
                                          <input type="hidden" name="_method" value="delete">
                                      </form>
                          </td>
                      @endif
                    </tr>
          @endforeach
              
              
                </tbody>
              </table>
            </div>
          </div>
        </div>
    
      </div>


@endif

@endsection
















@section('qysuser')
{{-- ----------------------------------------------------------------------------------------- --}}
@if (Auth::user()->rol == 3)

<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Quejas y sugerencias</h1>


{{-- Alertas Correcto --}}
<div class="row">
  @if ($message = Session::get('Listo'))
      <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
          <h5>Correcto</h5>
      <span>{{ $message }}</span>   
      </div>    

  @endif

</div>

{{-- Alertas Error --}}
<div class="row">
  @if ($message = Session::get('ErrorInsert'))
      <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
          <h5>Errores:</h5>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>                    
              @endforeach    
          </ul>    
      </div>    

  @endif

</div>

<form action="/dash/admin/qys" method="POST">

            @csrf

            <input type="hidden" class="form-control" name="id_user" placeholder="Usuario ID Pruebas" value="{{ Auth::user()->id }}">       
            <input type="hidden" class="form-control" name="email" placeholder="email Pruebas" value="{{ Auth::user()->email}}">

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Escriba aquí su comentario.</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="contenido" placeholder="Contenido..." ></textarea>
            </div>
            
            
            <div class="col-md-3 mb-3      col-lg-10 col-md-10 col-sm-12    ml-auto mb-auto mr-auto mt-auto">
            {{-- ////////////////////////////// --}}
              <label for="validationCustom04" class="col-lg-auto col-md-0 col-sm-12 ">Tipo</label>
              
                  <select class="custom-select    col-lg-4 col-md-12 col-sm-10    ml-auto mb-auto mr-auto mt-auto" name="tipo" id="validationCustom04" >
                    <option selected disabled value="">Seleccionar</option>
                    <option value="1">Queja</option>
                    <option value="2">Sugerencia</option>
                  </select>

            {{-- ////////////////////////////// --}}
              <label for="validationCustom04" class="col-lg-auto col-md-0 col-sm-12">Sucursal</label>
              
                  <select class="custom-select   col-lg-4 col-md-12 col-sm-10    ml-auto mb-auto mr-auto mt-auto" name="sucursal" id="validationCustom04" >
                    <option selected disabled value="">Seleccionar</option>
                    
                    
                    @foreach ($sucursales as $sucursal)
                        <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                    @endforeach
                    
                  </select>

            </div>

            <div class="     col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-4" style="text-align: center">

              {{-- <div class="col-lg-5 col-md-3 col-sm-1    ml-auto mb-auto mr-auto mt-auto"></div> --}}

                  <button type="submit" id="" class="btn btn-outline-success  col-lg-2 col-md-6 col-sm-10  ml-auto mb-auto mr-auto mt-auto" 
                  style="margin-top: 30px;">Enviar</button>
                  {{-- <button type="submit" id="" class="btn btn-outline-success  col-lg-2 col-md-6 col-sm-10  float-lg-right    ml-auto mb-auto mr-auto mt-auto" 
                  style="margin-top: 30px;">Enviar</button> --}}
              {{-- <div class="col-lg-5 col-md-3 col-sm-1    ml-auto mb-auto mr-auto mt-auto"></div> --}}

            </div>

  
</form>







<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eleminar queja o sugerencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      
          <div class="modal-body">
                
                <h5 class="mb-3 mt-3">¿Desea eliminar la queja o sugerencia?</h5>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                </div>

          </div>

    

    </div>
  </div>
</div>
{{-- ////////////////////////////////////////////////////////////////////// --}}


 <!-- DataTales Example -->
 <div class="card shadow mt-5">
  <div class="card-header py-3">
    {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>E-mail</th>
            <th>Contenido</th>
            <th>Tipo</th>
            <th>Fecha</th>
            <th>Sucursal</th>
        </thead>

        <tfoot>
            <th>E-mail</th>
            <th>Contenido</th>
            <th>Tipo</th>
            <th>Fecha</th>
            <th>Sucursal</th>
        </tfoot>

        {{-- CAMPOS --}}
        @foreach ($qysuguser as $qys)

            <tr>
              <td>{{ $qys ->email }}</td>
              <td>{{ $qys ->contenido }}</td>
              @if ($qys ->tipo=='1')
                <td>
                  <button class="btn btn-danger boton">Queja</button>                   
                </td> 
              @else     
                <td>
                  <button class="btn btn-info boton">Sugerencia</button>                   
                </td>
              @endif 
              <td>{{ $qys ->created_at }}</td>
              <td>{{ $qys ->Sucursal }}</td>
            </tr>
            
        @endforeach 
      
      
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

@endif


@endsection





@section('scripts')
<script>

var idEliminar=0;

    $(".btnEliminar").click(function(){      
     idEliminar = $(this).data('id');
    });


    $(".btnModalEliminar").click(function(){ 
     $("#formEli_"+idEliminar).submit();
    });
    









</script>

@endsection