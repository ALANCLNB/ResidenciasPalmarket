


@section('categorias')

<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-auto mr-auto" 
style="float: right" data-toggle="modal" data-target="#modalAgregar"><i class="fas fa-plus fa-sm text-white-50"></i> Nueva Categoria</a>
<h1 class="h3 mb-2 text-gray-800">Categorias</h1>
<p class="mb-4">Bienvenido a categorias.</p>


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
              <th>Registrado</th>
              <th>Descripcion</th>
              <th>Imagen</th>
              <th>Acciones</th>
          </thead>
          
          <tfoot>
              <th>ID</th>
              <th>Registrado</th>
              <th>Descripcion</th>
              <th>Imagen</th>
              <th>Acciones</th>
          </tfoot>
  
          @foreach ($cate as $c)
                        <tr>
                          <td>{{ $c ->id }}</td>
                          <td>{{ $c ->Usernombre }}</td>
                          <td>{{ $c ->descripcion }}</td>
                          <td>
                          
                        <img class="ml-auto mr-auto" style="height: 50px; widht: 60;" src="{{ asset('/img/categorias/'.$c ->imagen) }}" alt="">

                        </td>
                          <td>
                              
                                  <button class="btn btn-info  btnEditar" 
                          
                                  data-id="{{ $c->id }}" 
                                  data-id_user="{{ $c->id_user }}"
                                  data-descripcion="{{ $c->descripcion }}" 
                            
                                  data-toggle="modal" data-target="#modalEditar">

                              <i class="fa fa-edit"></i></button>



                                  <button class="btn btn-danger  btnEliminar" data-id="{{ $c->id }}" data-toggle="modal" data-target="#modalEliminar">
                                    <i class="fa fa-trash"></i></button>
                                    
                                    
                                      <form action="{{ url('/dash/admin/categorias', ['id'=>$c->id] ) }}" method="POST" id="formEli_{{ $c->id }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $c->id }}">
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
            <h5 class="modal-title" id="exampleModalLabel">Agregar Categoría</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
  
          <form action="/dash/admin/categorias" method="POST" enctype="multipart/form-data">
              
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
                  {{-- //////////////////////// --}}
                  <div role="alert" id="error-div">
                      <ul class="custom-errors">
    
                      </ul>
                  </div>
                </div>
                {{-- Fin Alerta Errores --}}

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="Usuario" value="{{ auth()->user()->id }}">
                    </div>


                    <div class="form-group">
                        <input type="hidden" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ old('descripcion') }}">
                    </div>
    
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="valorimg" name="valorimg" placeholder="tipo" >
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
    <input name="" type="file" id="image_fileC" accept="image/*">
  
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
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        
            <div class="modal-body">
                  
                  <h5 class="mb-3 mt-3">¿Desea eliminar la categoria?</h5>
  
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
        <h5 class="modal-title" id="exampleModalLabel">Editar Caregoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/dash/admin/productos/categorias/editar" method="POST">
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

                <div role="alert" id="error-divEdit">
                    <ul class="custom-errorsEdit">
  
                    </ul>
                </div>

              </div>
              {{-- Fin Alerta Errores --}}
              <div class="form-group">
              <input type="hidden" name="id_user" id="id_userEdit" value="{{Auth::user()->id}}">
              </div>

              <div class="form-group">
                  <input type="hidden" name="id" id="idEdit">
              </div>

              <div class="form-group">
                <input type="hidden" class="form-control" id="descripcionEdit" name="descripcionEdit" placeholder="Descripcion" >
              </div>

              <div class="form-group">
                <input type="hidden" class="form-control" id="valorimgEdit" name="valorimgEdit" placeholder="tipo" value="image/webp" >
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
        <input name="img" type="file" id="image_fileEdit" accept="image/*">

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
  
  $('#image_fileC').on('change', function () { 
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

$('#image_fileC').change(function(){
        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;
        var fileType = this.files[0].type;
        var file = this.files[0];
        console.log(file);
        ///////////////CARGAR TYPE
        $("#valorimg").val(fileType);
        //alert('FileName : ' + fileName + '\nFileSize : ' + fileSize + ' bytes' + '\nTipo:' +fileType);
        //alert(file);
    });


  $('.upload-image').on('click', function (ev) {
    resize.croppie('result', {
      type: 'canvas',
      size: 'viewport'
      

    }).then(function (img) {
    
      $.ajax({
      url: "{{route('croppie.upload-imageC')}}",
      type: "POST",
      data: {"image":img, 
      
        "id_user":$('#id_user').val(),
        "descripcion":$('#descripcion').val(),
        "imagen":$('#valorimg').val(),
        "_token":$('input[name="_token"]').val()
        

       },
    
      success: function (data) {
        console.log(data);

        if (data.code !==200) {
          let errors = data.msg,

          error_div = $('#error-div'),
          error_list = $('.custom-errors');

          error_div.addClass('col-12 alert alert-danger alert-dismissable fade show');
          ///Vaciar <li>'s
          $('.custom-errors').empty();
          
          //console.log(data);
          $.each(errors,function(index,error){
            //$('.custom-errors').empty();
            error_list.append('<li>' +error+ '</li>')
          })
        }

          if (data.status == true) {
            location.href="/dash/admin/categorias";
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

  $('#image_fileEdit').change(function(){
        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;
        var fileType = this.files[0].type;
        var file = this.files[0];
        console.log(file);
        ///////////////CARGAR TYPE
        $("#valorimgEdit").val(fileType);
        //alert('FileName : ' + fileName + '\nFileSize : ' + fileSize + ' bytes' + '\nTipo:' +fileType);
        //alert(file);
    });

  $('.edit-image').on('click', function (ev) {
    resize2.croppie('result', {
      type: 'canvas',
      size: 'viewport'
      

    }).then(function (img) {
    
      $.ajax({
      url: "{{route('croppie.editarcate-image')}}",
      type: "POST",
      data: {"image":img, 
        //Enviar datos por AJAX
        "id":$('#idEdit').val(),
        "id_user":$('#id_userEdit').val(),
        "descripcion":$('#descripcionEdit').val(),
        "imagen":$('#valorimgEdit').val(),
        "_token":$('input[name="_token"]').val()
       
        

       },
    
      success: function (data) {
        console.log(data);

        if (data.code !==200) {
          let errors = data.msg,

          error_div = $('#error-divEdit'),
          error_list = $('.custom-errorsEdit');

          error_div.addClass('col-12 alert alert-danger alert-dismissable fade show');
          ///Vaciar <li>'s
          $('.custom-errorsEdit').empty();
          
          //console.log(data);
          $.each(errors,function(index,error){
            //$('.custom-errors').empty();
            error_list.append('<li>' +error+ '</li>')
          })
        }



          if (data.status == true) {
            location.href="/dash/admin/categorias";
          }
        }
        
       });
       
    });
    
  });



//Cargar datos en el formulario
$(".btnEditar").click(function(){ 

$("#idEdit").val($(this).data('id'));
//$("#usuarioEdit").val($(this).data('id_user'));
$("#descripcionEdit").val($(this).data('descripcion'));

});

</script>









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








  </script>

@endsection