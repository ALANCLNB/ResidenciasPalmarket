@extends('dashboard.dash')


@section('cupones')

<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-auto mr-auto" 
style="float: right" data-toggle="modal" data-target="#modalAgregar"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo Cupon</a>
<h1 class="h3 mb-2 text-gray-800">Cupones</h1>
<p class="mb-4">Bienvenido a cupones.</p>


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
            <th>Id</th>
            <th>Usuario</th>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>Categoria</th>
            <th>Acciones</th>
        </thead>

        <tfoot>
            <th>Id</th>
            <th>Usuario</th>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>Categoria</th>
            <th>Acciones</th>
        </tfoot>

        @foreach ($cupon as $cupones)

                      <tr>
                        <td>{{ $cupones ->id }}</td>
                        <td>{{ $cupones ->Usernombre }}</td>
                        <td>{{ $cupones ->codigo }}</td>
                        <td>{{ $cupones ->descripcion }}</td>
                        <td>{{ $cupones ->Catedesc }}</td>
                        <td>
                            
                            <button class="btn btn-info  btnEditar" 
                              
                                  data-id="{{ $cupones->id }}" 

                                  data-codigo="{{ $cupones->codigo }}"
                                  data-descripcion="{{ $cupones->descripcion }}" 
                                  data-id_categoria="{{ $cupones->id_categoria }}" 

                                  data-toggle="modal" data-target="#modalEditar">

                                  <i class="fa fa-edit"></i>
                            </button>
                    
                                <button class="btn btn-danger  btnEliminar" data-id="{{ $cupones->id }}" data-toggle="modal" data-target="#modalEliminar">
                                  <i class="fa fa-trash"></i></button>
                                  
                                  
                                    <form action="{{ url('/dash/admin/cupones', ['id'=>$cupones->id] ) }}" method="POST" id="formEli_{{ $cupones->id }}">
                                          @csrf
                                          <input type="hidden" name="id" value="{{ $cupones->id }}">
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



    <!-- Modal Agregar -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Cupon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
  

          <form action="/dash/admin/cupones" method="POST">
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
                    <input type="text" class="form-control" name="codigo" placeholder="Codigo" value="{{ old('codigo') }}">
                  </div>

                  <div class="form-group">
                  <input type="text" class="form-control" name="descripcion" placeholder="Descripción" value="{{ old('descripcion') }}">
                  </div>

                  <div class="form-group">
                    <label for="validationCustom04"  class="col-lg-12 col-md-12 col-sm-12">Categoria</label>
                
                    <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" id="categoria" name="id_categoria" id="validationCustom04" required>
                      <option selected disabled value="">Seleccionar</option>
                      
                      
                      @foreach ($categoria as $cat)
                          <option value="{{ $cat->id }}">{{ $cat->descripcion }}</option>
                      @endforeach
                      
                    </select>
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Cupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      
          <div class="modal-body">
                
                <h5 class="mb-3 mt-3">¿Desea eliminar el cupon?</h5>

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
        <h5 class="modal-title" id="exampleModalLabel">Editar Cupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="/dash/admin/cupones/editar" method="POST">
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
                <input type="hidden" class="form-control" name="id_user" id="usuarioEdit" placeholder="Usuario" value="{{ Auth::user()->id }}">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="codigo" id="codigoEdit" placeholder="Codigo" >
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="descripcion" id="descripcionEdit" placeholder="Descripción" value="{{ old('descripcion') }}">
              </div>

              <div class="form-group">
                <label   class="col-lg-12 col-md-12 col-sm-12">Categoria</label>
            
                <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" id="categoriaEdit" name="id_categoria"  required>
                  <option selected disabled value="">Seleccionar</option>
                  
                  
                  @foreach ($categoria as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->descripcion }}</option>
                  @endforeach
                  
                </select>
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
                $("#modalAgregar").modal('show');  
        
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
$("#codigoEdit").val($(this).data('codigo'));
$("#descripcionEdit").val($(this).data('descripcion'));
$("#categoriaEdit").val($(this).data('id_categoria'));
});


  </script>

@endsection