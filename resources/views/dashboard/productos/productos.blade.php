@extends('dashboard.dash')





@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

@endsection






@section('productos')


{{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-auto mr-auto col-sm-4" 
style="float: right" data-toggle="modal" data-target="#modalAgregarP"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo Producto</a> --}}

<button class="btn btn-sm btn-primary ml-auto mr-auto" style="float: right" data-toggle="modal" data-target="#modalAgregarP">
  <i class="fas fa-plus fa-sm text-white-50"></i>Nuevo Producto</button>

<h1 class="h3 mb-2 text-gray-800">Productos</h1>
<p class="mb-4">Bienvenido a productos.</p>


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
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Marca</th>
            <th>Precio Actual</th>
            <th>Precio Anterior</th>
            <th>Usuario</th>
            <th>Categoría</th>
            <th>Embalaje</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </thead>
        
          <tfoot>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Marca</th>
            <th>Precio Actual</th>
            <th>Precio Anterior</th>
            <th>Usuario</th>
            <th>Categoría</th>
            <th>Embalaje</th>
            <th>Imagen</th>
            <th>Acciones</th> 
          </tfoot>

        @foreach ($prod as $producto)
                      <tr>
                        <td>{{ $producto ->id }}</td>
                        <td>{{ $producto ->nombre }}</td>
                        <td>{{ $producto ->stock }}</td>
                        <td>{{ $producto ->marca }}</td>
                        <td>{{ $producto ->precio }}</td>
                        <td>{{ $producto ->precio_ant }}</td>
                        <td>{{ $producto ->Usernombre }}</td>
                        <td>{{ $producto ->Cateid }}</td>
                        <td>{{ $producto ->embalaje }}</td>
                        <td>
                          
                        <img class="ml-auto mr-auto" style="height: 50px; widht: 60;" src="{{ asset('/img/'.$producto ->imagen) }}" alt="">

                        </td>
                        <td>
                            
                          <button class="btn btn-info  btnEditar" 
                          
                          data-id="{{ $producto->id }}" 

                          data-id_user="{{ $producto->id_user }}" 
                          data-nombre="{{ $producto->nombre }}" 
                          data-oferta="{{ $producto->oferta }}" 
                          data-stock="{{ $producto->stock }}" 
                          data-marca="{{ $producto->marca }}" 
                          data-embalaje="{{ $producto->embalaje }}"
                          data-precio="{{ $producto->precio }}" 
                          data-categoria="{{ $producto->categoria }}" 
                          data-imagen="{{ $producto->imagen }}" 
                    
                          data-toggle="modal" data-target="#modalEditar">
                      <i class="fa fa-edit"></i></button>  
                    
                                <button class="btn btn-danger  btnEliminar" data-id="{{ $producto->id }}" data-toggle="modal" data-target="#modalEliminar">
                                  <i class="fa fa-trash"></i></button>
                                            
                                            <form action="{{ url('/dash/admin/productos', ['id'=>$producto->id] ) }}" method="POST" id="formEli_{{ $producto->id }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $producto->id }}">
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

        <form action="/dash/admin/productos" method="POST" enctype="multipart/form-data">
            
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
                  <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Usuario" value="{{ Auth::user()->id }}">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                </div>

                <div class="form-group">
                  <label  class="col-lg-12 col-md-12 col-sm-12">Categoria</label>
              
                  <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" id="categoria" name="categoria" required>
                    <option selected disabled value="">Seleccionar</option>
                    
                    
                    @foreach ($categoria as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->descripcion }}</option>
                    @endforeach
                    
                  </select>
                </div>

                <div class="form-group">
                  <label  class="col-lg-12 col-md-12 col-sm-12">Oferta</label>
              
                  <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" id="oferta" name="oferta" required>
                    <option selected disabled value="">Seleccionar</option>
                    <option value="0">Si</option>
                    <option value="1">No</option>
                  </select>
                    
                </div>

                <div class="form-group">
                  <label  class="col-lg-12 col-md-12 col-sm-12">Embalaje</label>
              
                  <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" id="embalaje" name="embalaje" required>
                    <option selected disabled value="">Seleccionar</option>
                    <option value="Kg">Kg</option>
                    <option value="Pza">Pza</option>
                    <option value="Manojo">Manojo</option>
                  </select>
                    
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" value="{{ old('marca') }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio" value="{{ old('precio') }}">
                </div>

                

                <div class="form-group">
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" value="{{ old('stock') }}">
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



  <!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eleminar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      
          <div class="modal-body">
                
                <h5 class="mb-3 mt-3">¿Desea eliminar el producto?</h5>

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

      <form action="/dash/admin/productos/editar" method="POST">
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
                  <input type="hidden" name="id_user" id="id_userEdit">
              </div>

              <div class="form-group">
                  <input type="hidden" name="id" id="idEdit">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="nombreEdit" name="nombre" placeholder="Nombre" >
                </div>

                <div class="form-group">
                  <label  class="col-lg-12 col-md-12 col-sm-12">Categoria</label>

                  <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" id="categoriaEdit" name="categoria" required>
                    <option selected disabled value="">Seleccionar</option>
                    
                    
                    @foreach ($categoria as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->descripcion }}</option>
                    @endforeach
                    
                  </select>
                </div>

                <div class="form-group">
                  <label  class="col-lg-12 col-md-12 col-sm-12">Oferta</label>
              
                  <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" id="ofertaEdit" name="oferta"  required>
                    <option selected disabled value="">Seleccionar</option>
                    <option value="0">Si</option>
                    <option value="1">No</option>
                  </select>
                    
                </div>

                <div class="form-group">
                  <label  class="col-lg-12 col-md-12 col-sm-12">Embalaje</label>
              
                  <select class="custom-select   col-lg-12 col-md-12 col-sm-12    ml-auto mb-auto mr-auto mt-auto" id="embalajeEdit" name="embalajeEdit" required>
                    <option selected disabled value="">Seleccionar</option>
                    <option value="Kg">Kg</option>
                    <option value="Pza">Pza</option>
                    <option value="Manojo">Manojo</option>
                  </select>
                    
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="marcaEdit" name="marca" placeholder="Marca" >
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="precioEdit" name="precio" placeholder="Precio" >
                </div>

                <div class="form-group">
                  <input type="hidden" class="form-control" id="precio_antEdit" name="precio_ant" placeholder="Precio Anterior" >
              </div>

                

                <div class="form-group">
                    <input type="text" class="form-control" id="stockEdit" name="stock" placeholder="Stock" >
                </div>

               

          </div>

          {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
          </div> --}}

      </form>


            {{-- ///////////////////CROPPIE/////////////////////////// --}}
      <div class="row">
        
        <div class="col-md-12 text-center">
          <label class="col-lg-12 col-md-12 col-sm-12">Imagen</label>
        <div id="Edit-demo"></div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12 text-center" style="padding:5%;">
        <strong>Seleccione una imagen:</strong>
      {{-- ///////////////////////////////////Input////////////////////////////////// --}}
        <input name="img" type="file" id="image_fileEdit" value="">

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
      url: "{{route('croppie.upload-image')}}",
      type: "POST",
      data: {"imagen":img, 
      
        "id_user":$('#id_user').val(),
        "nombre":$('#nombre').val(),
        "categoria":$('#categoria').val(),
        "oferta":$('#oferta').val(),
        "marca":$('#marca').val(),
        "precio":$('#precio').val(),
        "stock":$('#stock').val(),
        "embalaje":$('#embalaje').val(),
        "_token":$('input[name="_token"]').val()
        

       },
    
      success: function (data) {
        console.log(data);

          if (data.status == true) {
            location.href="/dash/admin/productos";
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
      url: "{{route('croppie.editar-image')}}",
      type: "POST",
      data: {"image":img, 
        //Enviar datos por AJAX
        "id":$('#idEdit').val(),
        "id_user":$('#id_userEdit').val(),
        "embalaje":$('#embalajeEdit').val(),
        "nombre":$('#nombreEdit').val(),
        "categoria":$('#categoriaEdit').val(),
        "oferta":$('#ofertaEdit').val(),
        "marca":$('#marcaEdit').val(),
        "precio":$('#precioEdit').val(),
        "precio_ant":$('#precio_antEdit').val(),
        "stock":$('#stockEdit').val(),
        "_token":$('input[name="_token"]').val()
        

       },
    
      success: function (data) {
        console.log(data);

          if (data.status == true) {
            location.href="/dash/admin/productos";
          }
        }
        
       });
       
    });
    
  });



//Cargar datos en el formulario
  $(".btnEditar").click(function(){ 

$("#idEdit").val($(this).data('id'));
$("#id_userEdit").val($(this).data('id_user'));
$("#embalajeEdit").val($(this).data('embalaje'));
$("#nombreEdit").val($(this).data('nombre'));
$("#categoriaEdit").val($(this).data('categoria'));
$("#ofertaEdit").val($(this).data('oferta'));
$("#marcaEdit").val($(this).data('marca'));
$("#precioEdit").val($(this).data('precio'));
$("#precio_antEdit").val($(this).data('precio'));
$("#stockEdit").val($(this).data('stock'));

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







{{-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.imgareaselect.min.js') }}"></script>
    <script>
    jQuery(function($) {
        var p = $("#previewimage");
 
        $("body").on("change", ".image", function(){
            var imageReader = new FileReader();
            imageReader.readAsDataURL(document.querySelector(".image").files[0]);
 
            imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });
 
        $('#previewimage').imgAreaSelect({
          maxWidth:10,
          height:300,
            onSelectEnd: function (img, selection) {
                $('input[name="x1"]').val(selection.x1);
                $('input[name="y1"]').val(selection.y1);
                $('input[name="w"]').val(400);
                $('input[name="h"]').val(300);            
            }
        });
    });


    
    </script> --}}
  


@endsection