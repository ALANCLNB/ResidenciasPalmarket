@extends('dashboard.dash')




@section('roles')


<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-auto mr-auto" 
style="float: right" data-toggle="modal" data-target="#modalAgregarC"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo Rol</a>
<h1 class="h3 mb-2 text-gray-800">Roles</h1>
<p class="mb-4">Bienvenido a roles.</p>


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
              <th>Registrado por:</th>
              <th>Descripcion</th>
              <th>Acciones</th>
          </thead>
          
          <tfoot>
            {{-- <th>ID</th>
            <th>Registrado por:</th>
            <th>Descripcion</th> --}}
          </tfoot>
  
          @foreach ($role as $rol)
                        <tr>
                          <td>{{ $rol ->id }}</td>
                          <td>{{ $rol ->Usernombre }}</td>
                          <td>{{ $rol ->descripcion }}</td>
                          <td>
                              
                            @if ($rol->id != '2' || $rol->id != '1')
                                
                            
                                    <button class="btn btn-info  btnEditar" 
                                      
                                        data-id="{{ $rol->id }}" 
                                        data-id_user="{{ $rol->id_user }}"
                                        data-descripcion="{{ $rol->descripcion }}" 
                                  
                                        data-toggle="modal" data-target="#modalEditar">

                                        <i class="fa fa-edit"></i>
                                    </button>
                            @endif

                      
                                  <button class="btn btn-danger  btnEliminar" data-id="{{ $rol->id }}" data-toggle="modal" data-target="#modalEliminar">
                                    <i class="fa fa-trash"></i></button>
                                    
                                    
                                      <form action="{{ url('/dash/admin/roles', ['id'=>$rol->id] ) }}" method="POST" id="formEli_{{ $rol->id }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $rol->id }}">
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
              <h5 class="modal-title" id="exampleModalLabel">Agregar rol</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    

            <form action="/dash/admin/roles" method="POST">
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
                    <input type="hidden" class="form-control" name="id_user" placeholder="Usuario" value="{{ Auth::user()->id }}">
                    </div>

                    <div class="form-group">
                    <input type="text" class="form-control" name="descripcion" placeholder="Descripción" value="{{ old('descripcion') }}">
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
          <h5 class="modal-title" id="exampleModalLabel">Eleminar Rol</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        
            <div class="modal-body">
                  
                  <h5 class="mb-3 mt-3">¿Desea eliminar el rol?</h5>
  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                  </div>
  
            </div>
  
      
  
      </div>
    </div>
  </div>




 <!-- Modal Agregar -->
 <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="/dash/admin/roles/editar" method="POST">
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
                <input type="hidden" class="form-control" name="id_user" placeholder="Usuario" value="{{ Auth::user()->id }}">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="descripcion" id="descripcionEdit" placeholder="Descripción" value="{{ old('descripcion') }}">
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
//$("#usuarioEdit").val($(this).data('id_user'));
$("#descripcionEdit").val($(this).data('descripcion'));

});



  </script>

@endsection