@extends('dashboard.dash')







@section('ofertaspdf')

<button class="btn btn-sm btn-primary ml-auto mr-auto" style="float: right" data-toggle="modal" data-target="#modalAgregar">
    <i class="fas fa-plus fa-sm text-white-50"></i>Nueva imagen</button>

  <h1 class="h3 mb-2 text-gray-800">Ofertas Imagenes</h1>
  <p class="mb-4">Bienvenido a ofertas.</p>




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
              <th>ID</th>
              <th>Usuario</th>
              <th>Archivo</th>
              <th>Acciones</th>
          </thead>
          
            <tfoot>
              <th>ID</th>
              <th>Usuario</th>
              <th>Archivo</th>
              <th>Acciones</th>
            </tfoot>
  
          @foreach ($oferta as $opdf)
                        <tr>
                          <td>{{ $opdf ->id }}</td>
                          <td>{{ $opdf ->id_user }}</td>
                          <td>{{ $opdf ->nombre }}</td> 
                          <td>
                              
                            <button class="btn btn-info  btnEditar" 
                            
                            data-id="{{ $opdf->id }}" 
                            data-id_user="{{ $opdf->id_user }}" 
                            data-nombre="{{ $opdf->nombre }}" 
                            
                      
                            data-toggle="modal" data-target="#modalEditar">
                        <i class="fa fa-edit"></i></button>  
                      
                                  <button class="btn btn-danger  btnEliminar" data-id="{{ $opdf->id }}" data-toggle="modal" data-target="#modalEliminar">
                                    <i class="fa fa-trash"></i></button>
                                              
                                              <form action="{{ url('/dash/admin/ofertasimg', ['id'=>$opdf->id] ) }}" method="POST" id="formEli_{{ $opdf->id }}">
                                                  @csrf
                                                  <input type="hidden" name="id" value="{{ $opdf->id }}">
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
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Cupon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>      
    
    <form method="POST" action="/dash/admin/ofertaspdf" enctype="multipart/form-data">
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
                <label for="archivo"><b>Archivo: </b></label><br>
                
                <input type="text" name="id_user" placeholder="Usuario" value="{{ Auth::user()->id }}" >
                <input type="file" name="archivo" accept="application/pdf">

                <input class="btn btn-success" type="submit" value="Enviar" >
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