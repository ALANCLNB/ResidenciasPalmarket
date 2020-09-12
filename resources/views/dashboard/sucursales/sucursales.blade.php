@extends('dashboard.dash')




@section('sucursal')

<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-auto mr-auto" 
style="float: right" data-toggle="modal" data-target="#modalAgregarC"><i class="fas fa-plus fa-sm text-white-50"></i> Nueva Sucursal</a>
<h1 class="h3 mb-2 text-gray-800">Sucursales</h1>
<p class="mb-4">Bienvenido a sucursales.</p>


{{-- Alerta Error al llenar campos --}}
<div class="row">
    @if ($message = Session::get('Listo'))
        <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
            <h5>Correcto</h5>
        <span>{{ $message }}</span>   
        </div>    

    @endif

</div>

<div class="modal-body">
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
              <th>Nombre</th>
              <th>Dirección</th>
              <th>Acciones</th>
          </thead>
          
          <tfoot>
            {{-- <th>ID</th>
            <th>Registrado por:</th>
            <th>Descripcion</th> --}}
          </tfoot>
  
          @foreach ($sucu as $sucursal)
                        <tr>
                          <td>{{ $sucursal ->id }}</td>
                          <td>{{ $sucursal ->nombre }}</td>
                          <td>{{ $sucursal ->direccion }}</td>
                          <td>
                              
                            <button class="btn btn-info  btnEditar" 
                          
                                      data-id="{{ $sucursal->id }}" 
                                      data-nombre="{{ $sucursal->nombre }}"
                                      data-direccion="{{ $sucursal->direccion }}" 
                                
                                      data-toggle="modal" data-target="#modalEditar">

                                      <i class="fa fa-edit"></i>
                            </button>
                      
                                  <button class="btn btn-danger  btnEliminar" data-id="{{ $sucursal->id }}" data-toggle="modal" data-target="#modalEliminar">
                                    <i class="fa fa-trash"></i></button>
                                    
                                    
                                      <form action="{{ url('/dash/admin/sucursales', ['id'=>$sucursal->id] ) }}" method="POST" id="formEli_{{ $sucursal->id }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $sucursal->id }}">
                                            <input type="hidden" name="_method" value="delete">
                                      </form>
                                  
                          </td>
                        </tr>
                  @endforeach
          
        
        
              
  
  
          
           
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

    <!-- Modal Agregar -->
    <div class="modal fade" id="modalAgregarC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar sucursal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    

            <form action="/dash/admin/sucursales" method="POST">
                @csrf
                <div class="modal-body">
    
                    {{-- Alerta Error al llenar campos --}}
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
                    {{-- Fin Alerta Errores --}}
    
                    <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                    </div>

                    <div class="form-group">
                    <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="{{ old('direccion') }}">
                    </div>
    
    
                    
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
    
            </form>
    
          </div>
        </div>
      </div>

  <!-- Modal Eliminar -->
  <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eleminar Sucursal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        
            <div class="modal-body">
                  
                  <h5 class="mb-3 mt-3">¿Desea eliminar la sucursal?</h5>
  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                  </div>
  
            </div>
  
      
  
      </div>
    </div>
  </div>




  <!-- Modal Editar -->
  <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar sucursal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="/dash/admin/sucursales/editar" method="POST">
            @csrf
            <div class="modal-body">

                {{-- Alerta Error al llenar campos --}}
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
                {{-- Fin Alerta Errores --}}
                <div class="form-group">
                  <input type="hidden" name="id" id="idEdit">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="nombre" id="nombreEdit" placeholder="Nombre" value="{{ old('nombre') }}">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="direccion" id="direccionEdit" placeholder="Direccion" value="{{ old('direccion') }}">
                </div>


                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>

      </div>
    </div>
  </div>



@endsection





@section('scripts')

  <script>
      $(document).ready(function(){
        @if ($message = Session::get('ErrorInsert'))
                $("#modalAgregarC").modal('show');  
        
            @endif
      });


      var idEliminar=0;

$(".btnEliminar").click(function(){      
 idEliminar = $(this).data('id');
});


$(".btnModalEliminar").click(function(){ 
 $("#formEli_"+idEliminar).submit();
});


//Cargar datos en el formulario
$(".btnEditar").click(function(){ 

$("#idEdit").val($(this).data('id'));
$("#nombreEdit").val($(this).data('nombre'));
$("#direccionEdit").val($(this).data('direccion'));

});


  </script>

@endsection