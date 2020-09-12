@extends('dashboard.dash')





@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

@endsection







   


{{-- <div class="col-sm-12 col-md-8 col-lg-8    ml-auto mr-auto mt-auto mb-auto">
      
        @csrf


<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-8 form-group" >
        <label class="ml-2">Nombre</label>
        <input class= "form-control " type="text" name="nombre" value="{{ old('nombre') }} "  placeholder="Nombre de la rutina">
    </div> --}}

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

    


{{-- </div>
    
<div class="col-sm-12 col-md-4 col-lg-4 " >
    <label class="ml-2">Imagen</label> 
    <input class= "form-control-file " type="file" name="imagen" value="" accept="image/*" placeholder="Imagen" style="z-index: 50; ">
</div>

    <button type="submit" id="btnSubirPDF" class="btn btn-outline-success" style="margin-top: 30px;">Guardar</button>

    </div> --}}



@section('ofertasimg')
    
    <button class="btn btn-sm btn-primary ml-auto mr-auto" style="float: right" data-toggle="modal" data-target="#modalAgregarP">
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
                <th>Imagen</th>
                <th>Acciones</th>
            </thead>
            
              <tfoot>
                <th>ID</th>
                <th>Usuario</th>
                <th>Archivo</th>
                <th>Imagen</th>
                <th>Acciones</th>
              </tfoot>
    
            @foreach ($ofertaimg as $oi)
                          <tr>
                            <td>{{ $oi ->id }}</td>
                            <td>{{ $oi ->Usernombre }}</td>
                            <td>{{ $oi ->nombre }}</td>
                            <td>
                              
                            <img class="ml-auto mr-auto" style="height: 50px; widht: 60;" src="{{ asset('/ofertas/img/'.$oi ->nombre) }}" alt="">
    
                            </td> 
                            <td>
                                
                              <button class="btn btn-info  btnEditar" 
                              
                              data-id="{{ $oi->id }}" 
                              data-id_user="{{ $oi->id_user }}" 
                              data-nombre="{{ $oi->nombre }}" 
                              
                        
                              data-toggle="modal" data-target="#modalEditar">
                          <i class="fa fa-edit"></i></button>  
                        
                                    <button class="btn btn-danger  btnEliminar" data-id="{{ $oi->id }}" data-toggle="modal" data-target="#modalEliminar">
                                      <i class="fa fa-trash"></i></button>
                                                
                                                <form action="{{ url('/dash/admin/ofertasimg', ['id'=>$oi->id] ) }}" method="POST" id="formEli_{{ $oi->id }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $oi->id }}">
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
 <div class="modal fade" id="modalAgregarP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/dash/admin/ofertasimg" method="POST" enctype="multipart/form-data">
          
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
              <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Usuario" value="1">
              </div>


           {{-- ////////////////////////////////////////////// --}}
              

          </div>

          {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
          </div> --}}

      </form>

      
    {{-- ///////////////////CROPPIE/////////////////////////// --}}
<div class="row">

<div class="col-md-12 text-center">
  <label   class="col-lg-12 col-md-12 col-sm-12">Imagen</label>
<div id="upload-demo"></div>
</div>
</div>


<div class="row">
<div class="col-md-12 text-center" style="padding:5%;">
<strong>Seleccione una imagen:</strong>
{{-- ///////////////////////////////////Input////////////////////////////////// --}}
<input name="" type="file" id="image_file">

<div class="btn-group mt-4 d-flex w-100" role="group" >
  <button class="btn btn-primary upload-image " style="float: right !important;">Guardar</button>
<button class="btn btn-secondary "  data-dismiss="modal" style="float: right !important;">Cerrar</button>

</div>
{{-- <div class="alert alert-success" id="upload-success" style="display: none;margin-top:10px;"></div> --}}
</div> 
</div>

{{-- ///////////////////FIN CROPPIE/////////////////////////// --}}





    </div>
  </div>

</div>


<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/dash/admin/ofertasimg/editar" method="POST" enctype="multipart/form-data">
          
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
                <input type="text" class="form-control" id="idEdit" name="" placeholder="Id" >
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" id="id_userEdit" name="" placeholder="Usuario" >
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="nombreEdit" name="" placeholder="Nombre" >
              </div>

              

           {{-- ////////////////////////////////////////////// --}}
              

          </div>

          {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
          </div> --}}

      </form>

      
    {{-- ///////////////////CROPPIE/////////////////////////// --}}
    <div class="row">
        
      <div class="col-md-12 text-center">
        <label   class="col-lg-12 col-md-12 col-sm-12">Imagen</label>
      <div id="Edit-demo"></div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12 text-center" style="padding:5%;">
      <strong>Seleccione una imagen:</strong>
    {{-- ///////////////////////////////////Input////////////////////////////////// --}}
      <input name="" type="file" id="image_fileEdit">

      <div class="btn-group mt-4 d-flex w-100" role="group" >
        <button class="btn btn-primary edit-image " style="float: right !important;">Guardar</button>
      <button class="btn btn-secondary "  data-dismiss="modal" style="float: right !important;">Cerrar</button>
      
      </div>
      {{-- <div class="alert alert-success" id="upload-success" style="display: none;margin-top:10px;"></div> --}}
      </div> 
    </div>
{{-- ///////////////////FIN CROPPIE/////////////////////////// --}}





    </div>
  </div>

</div>

      <!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar oferta (imagen)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      
          <div class="modal-body">
                
                <h5 class="mb-3 mt-3">¿Desea eliminar la imagen?</h5>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger btnModalEliminar">Eliminar</button>
                </div>

          </div>

    

    </div>
  </div>
</div>
@endsection




@section('scripts')

<script src="{{asset('/js/croppie.js')}}"></script>

<script>
 



  var resize = $('#upload-demo').croppie({
      enableExif: true,
      enableOrientation: true,    
      viewport: { // Default { width: 100, height: 100, type: 'square' } 
          width: 400,
          height: 300,
          type: 'square' //square,circle
      },
      boundary: {
          width: 500,
          height: 400
      }
  });
  
  $('#image_file').on('change', function () { 
    var reader = new FileReader();
      reader.onload = function (e) {
        resize.croppie('bind',{
          url: e.target.result
        }).then(function(){
          console.log('jQuery bind complete');
        });
      }
      reader.readAsDataURL(this.files[0]);
  });


//$('.upload-image').click(function() {
    //$('.upload-image').click();
  //  console.log('gg');
//});

  $('.upload-image').on('click', function (ev) {
    resize.croppie('result', {
      type: 'canvas',
      size: 'viewport'
      

    }).then(function (img) {
    
      $.ajax({
      url: "{{route('croppie.subir-image')}}",
      type: "POST",
      data: {"image":img, 

        "nombre":$('#nombreEdit').val(),
        "id_user":$('#id_user').val(),
        "_token":$('input[name="_token"]').val()
        

       },
    
      success: function (data) {
        console.log(data);

          if (data.status == true) {
            location.href="/dash/admin/ofertasimg";
          }
        }
        
       });
       
    });
  });



//////////////////////////////////////////////////////////////////////////////////
var resize2 = $('#Edit-demo').croppie({
      enableExif: true,
      enableOrientation: true,    
      viewport: { // Default { width: 100, height: 100, type: 'square' } 
          width: 400,
          height: 300,
          type: 'square' //square,circle
      },
      boundary: {
          width: 500,
          height: 400
      }
  });
  
  $('#image_fileEdit').on('change', function () { 
    var reader = new FileReader();
      reader.onload = function (e) {
        resize2.croppie('bind',{
          url: e.target.result
        }).then(function(){
          console.log('jQuery bind complete');
        });
      }
      reader.readAsDataURL(this.files[0]);
  });

  $('.edit-image').on('click', function (ev) {
    resize2.croppie('result', {
      type: 'canvas',
      size: 'viewport'
      

    }).then(function (img) {
    
      $.ajax({
      url: "{{route('croppie.editarOferta-image')}}",
      type: "POST",
      data: {"image":img, 
        //Enviar datos por AJAX
        "id":$('#idEdit').val(),
        "id_user":$('#id_userEdit').val(),
        "nombre":$('#nombreEdit').val(),
        "_token":$('input[name="_token"]').val()
        

       },
    
      success: function (data) {
        console.log(data);

          if (data.status == true) {
            location.href="/dash/admin/ofertasimg";
          }
        }
        
       });
       
    });
    
  });



//Cargar datos en el formulario
  $(".btnEditar").click(function(){ 

$("#idEdit").val($(this).data('id'));
$("#id_userEdit").val($(this).data('id_user'));
$("#nombreEdit").val($(this).data('nombre'));

});

</script>







  <script>
      $(document).ready(function(){
        @if ($message = Session::get('ErrorInsert'))
                $("#modalAgregarP").modal('show');  
        
            @endif
      });


      var idEliminar=0;

    $(".btnEliminar").click(function(){      
     idEliminar = $(this).data('id');
    });


    $(".btnModalEliminar").click(function(){ 
     $("#formEli_"+idEliminar).submit();
    });
//**************************************************************************************


  </script>

@endsection