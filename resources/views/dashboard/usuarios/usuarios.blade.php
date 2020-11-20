@extends('dashboard.dash')





@section('agregar-user')
    
@endsection



@section('usuarios')


<div class="container-fluid">
 
    {{-- <div>
      <img class="w-100 h-100" id="imgPdash" src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" alt="">
    </div> --}}
       
        <!-- Page Heading -->
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-auto mr-auto" 
        style="float: right" data-toggle="modal" data-target="#modalAgregar"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo Usuario</a>
        <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
        <p class="mb-4">Bienvenido a usuarios.</p>

        <div class="modal-body">

            {{-- Alerta Error al llenar campos --}}
            <div class="row">
                @if ($message = Session::get('Listo'))
                    <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
                        <h5>Correcto</h5>
                    <span>{{ $message }}</span>   
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
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Sucursal</th>
                    <th>Acciones</th>
                </thead>
    
                <tfoot>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>E-mail</th>
                  <th>Rol</th>
                  <th>Sucursal</th>
                  <th>Acciones</th>
                </tfoot>
    

                @foreach ($usuarios as $usuario)
                
               
                {{-- @if ($usuario->apellidos =="Corona") --}}
                
                      <tr>
                        <td>{{ $usuario ->nombre }}</td>
                        <td>{{ $usuario ->apellidos }}</td>
                        <td>{{ $usuario ->email }}</td>
                        <td>{{ $usuario ->Rol }}</td>
                        
                        @if (($usuario ->sucursal) == 2)
                            <td>S/S - Cliente</td>
                        @else
                            <td>{{ $usuario ->Sucursal }}</td>
                        @endif 
                        
                        
                        {{-- @if ($usuario ->sucursal == '0')
                            <td>hughfh</td>
                        @else
                            <td>{{ $usuario ->Sucursal }}</td>
                        @endif --}}

                        <td>
                            

                          <button class="btn btn-info  btnEditar" 
                          
                                data-id="{{ $usuario->id }}" 

                                data-nombre="{{ $usuario->nombre }}" 
                                data-apellidos="{{ $usuario->apellidos }}" 
                                data-email="{{ $usuario->email }}" 
                                data-rol="{{ $usuario->rol }}" 
                                data-sucursal="{{ $usuario->sucursal }}" 
                          
                                data-toggle="modal" data-target="#modalEditar">
                            <i class="fa fa-edit"></i></button>  
                       

                      {{-- @if ($usuario->apellidos =="Corona") --}}
                                {{-- <button class="btn btn-warning  btnOcultar" 
                                data-id="{{ $usuario->id }}" 
                                data-estado="{{ $usuario->estado }}"
                                
                                data-toggle="modal" data-target="#modalEstado">
                                  <i class="fa fa-eye-slash"></i></button>   --}}

                                  <button data-id="{{ $usuario->id }}"
                                    class="estado btn btn-{{ $usuario->estado == 1 ? "success" : "warning"}}"><i class="fa {{ $usuario->estado == 1 ? "fa-eye" : "fa-eye-slash"}}"></i></button>


                      {{-- @endif  --}}           
                                  
                                @if ($usuario->rol >='2')

                                <button class="btn btn-danger  btnEliminar" data-id="{{ $usuario->id }}" data-toggle="modal" data-target="#modalEliminar">
                                  <i class="fa fa-trash"></i></button>

                                @endif

                                    <form action="{{ url('/dash/admin/usuarios', ['id'=>$usuario->id] ) }}" method="POST" id="formEli_{{ $usuario->id }}">
                                          @csrf
                                          <input type="hidden" name="id" value="{{ $usuario->id }}">
                                          <input type="hidden" name="_method" value="delete">
                                    </form> 

                        </td>
                      </tr>
                {{-- @endif       --}}
                @endforeach

            
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
    
      </div>




      <!-- Modal Agregar -->
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="/dash/admin/usuarios" method="POST">
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
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellido" value="{{ old('apellido') }}">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Correo electronico" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="pass1" placeholder="Contraseña">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="pass2" placeholder="Confirmar contraseña">
                </div>

                {{-- <div class="form-group">
                    <input type="file" class="form-control" name="imagen" placeholder="Imagen">
                </div> --}}

                <div class="form-group">
                  <label for="" class="col-lg-12 col-md-12 col-sm-12">Rol</label>
              
                  <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" name="rol"  required>
                    <option selected disabled value="">Seleccionar</option>
                    
                    
                    @foreach ($rol as $r)
                        <option value="{{ $r->id }}">{{ $r->descripcion }}</option>
                    @endforeach
                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="validationCustom04" class="col-lg-12 col-md-12 col-sm-12">Sucursal</label>
              
                  <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" name="sucursal" id="validationCustom04" required>
                    <option selected disabled value="">Seleccionar</option>
                    
                    
                    @foreach ($sucu as $suc)
                        <option value="{{ $suc->id }}">{{ $suc->nombre }}</option>
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
        <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      
          <div class="modal-body">
                
                <h5 class="mb-3 mt-3">¿Desea eliminar este usuario?</h5>

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
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/dash/admin/usuarios/editar" method="POST">
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
              <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" id="nameEdit">
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="apellidos" placeholder="Apellido" value="{{ old('apellido') }}" id="apellidoEdit">
              </div>

              <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Correo electronico" value="{{ old('email') }}" id="emailEdit">
              </div>

              <div class="form-group">
                  <input type="password" class="form-control" name="pass1" placeholder="Contraseña">
              </div>

              <div class="form-group">
                  <input type="password" class="form-control" name="pass2" placeholder="Confirmar contraseña">
              </div>

              <div class="form-group">
                <label for="" class="col-lg-12 col-md-12 col-sm-12">Rol</label>
            
                <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" name="rol"  required id="rolEdit">
                  <option selected disabled value="">Seleccionar</option>
                  
                  
                  @foreach ($rol as $r)
                      <option value="{{ $r->id }}">{{ $r->descripcion }}</option>
                  @endforeach
                  
                </select>
              </div>

              <div class="form-group">
                <label for="" class="col-lg-12 col-md-12 col-sm-12">Sucursal</label>
            
                <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" name="sucursal"  required id="sucursalEdit">
                  <option selected disabled value="">Seleccionar</option>
                  
                  
                  @foreach ($sucu as $suc)
                      <option value="{{ $suc->id }}">{{ $suc->nombre }}</option>
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


 <!-- Modal Deshabilitar -->
 {{-- <div class="modal fade" id="modalEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/dash/admin/usuarios/estado" method="POST">
          @csrf
          <div class="modal-body">

              Fin Alerta Errores 
              <div class="form-group">
              <input type="text" name="id" id="idDes">
              </div>
              
              Mensaje 
              @if ($usuarios ->estado == 0)
                  <h5 class="mb-3 mt-3">¿Desea habilitar este usuario?</h5>
                  <input type="text" id="estado1" value="1">
              @else
                  <h5 class="mb-3 mt-3">¿Desea deshabilitar este usuario?</h5>
                  <input type="text" id="estado2" value="0">
              @endif
              

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

      </form>

    </div>
  </div>
</div> --}}
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

    $(".btnEditar").click(function(){ 

     $("#idEdit").val($(this).data('id'));
     $("#nameEdit").val($(this).data('nombre'));
     $("#apellidoEdit").val($(this).data('apellidos'));
     $("#emailEdit").val($(this).data('email'));
     $("#rolEdit").val($(this).data('rol'));
     $("#sucursalEdit").val($(this).data('sucursal'));

    });

/*
    $(".btnOcultar").click(function(){ 

    $("#idDes").val($(this).data('id'));
    $("#estado").val($(this).data('1'));

    });
*/

document.querySelectorAll(".estado").forEach(button => button.addEventListener("click",function(){
  //console.log("Hola Mund :"+button.getAttribute("data-id"));
  var id = button.getAttribute("data-id"); 
        
        
  $.ajax({
        method: "POST",
        url: "{{ URL::to("/") }}/dash/admin/usuarios/"+id,
        data:{'_token':'{{ csrf_token() }}'}
        })
        .done(function( approved ) {
            if(approved == 1){
                $(button).removeClass("btn-warning");
                $(button).addClass("btn-success");
                //$(button).text("fa-eye-slash");
            }else{
                $(button).removeClass("btn-success");
                $(button).addClass("btn-warning");
                //$(button).text("fa-eye");
            }
        });
        
        
}));



  </script>

@endsection