@extends('dashboard.dash')




@section('pedidosadmin')
<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-auto mr-auto" 
style="float: right" data-toggle="modal" data-target="#modalAgregar"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo Cupon</a>
<h1 class="h3 mb-2 text-gray-800">Pedidos</h1>
<p class="mb-4">Bienvenido a pedidos.</p>
@if (Auth::check())

<div class="container-fluid">
 

    {{-- <div>
      <img class="w-100 h-100" id="imgPdash" src="{{asset('/principal-archivos/assets/img/bg-header.png')}}" alt="">
    </div> --}}
    
    
        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Quejas y sugerencias</h1>
        <p class="mb-4">Rojo: Queja, Azul: Sugerencia.</p> --}}
       
        

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
                    <th>Sucursal</th>
                    <th>Cantidad de articulos</th>
                    <th>Total Aprox</th>
                    <th>Total</th>
                    <th>Codigo</th>
                    @if (Auth::user()->rol <= 2)
                    <th>Progreso</th>    
                    @else
                    <th>Reporte</th> 
                    @endif
                    
                    
                </thead>
    
            
    
                {{-- CAMPOS --}}
                @foreach ($pedidos as $pedido)
                    <tr 
                    @if ($pedido->status == 0)
                        class="bg-danger"
                    @endif
                    @if ($pedido->status == 1)
                        class="bg-warning"
                    @endif
                    @if ($pedido->status == 2)
                        class="bg-success"
                    @endif
                    >

                      <td style="color: white">{{ $pedido ->id }}</td>
                      <td style="color: white">{{ $pedido ->Correo }}</td>
                      <td style="color: white">{{ $pedido ->Sucursal }}</td>                  
                      <td style="color: white">{{ $pedido ->cantidad_articulos }}</td>
                      <td style="color: white">$ {{ $pedido ->total }}</td>
                      <td style="color: white">$ {{ $pedido ->total_final }}</td>
                      <td style="color: white">{{ $pedido ->codigo }}</td>
                     

                                     
                      <td>    

                        @if (Auth::user()->rol <= 2)                                               
                          <button data-id="{{ $pedido->id }}"
                              class="estado btn btn-{{ $pedido->status == 1 ? "success" : "warning"}}">                          
                              <i class="fa {{ $pedido->status == 1 ? "fa-eye" : "fa-eye-slash"}}"></i>
                          </button>   

                        @if ($pedido->total_final == 'No Asignado')
                        <button class="btn btn-info  btnEditar"                               
                            data-id="{{ $pedido->id }}" 
                            data-toggle="modal" data-target="#modalEditar"><i class="fa fa-edit"></i>
                        </button>
                        @endif  
                          
                        @endif


                        <a data-id="{{ $pedido->id }}" href="pedidos/ped={{ $pedido->id }}"
                            class="btnPedidoDetalles btn btn-dark" >                          
                            <i class="fas fa-th-list"></i>
                            {{-- data-toggle="modal" data-target="#pedidoProductos" --}}
                        </a> 
                                               
                      </td>
                  


                    </tr>
          @endforeach
              
              
                </tbody>
              </table>
            </div>
          </div>
        </div>
    
      </div>


@endif

<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Precio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="/dash/admin/pedidos/editar" method="POST">
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
                <input type="text" class="form-control" name="precio_final" id="precio_final" placeholder="Precio final" value="">
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

var idEliminar=0;

    $(".btnEliminar").click(function(){      
     idEliminar = $(this).data('id');
    });


    $(".btnModalEliminar").click(function(){ 
     $("#formEli_"+idEliminar).submit();
    });
    




  document.querySelectorAll(".estado").forEach(button => button.addEventListener("click",function(){
  //console.log("Hola Mund :"+button.getAttribute("data-id"));
  var id = button.getAttribute("data-id"); 
        
        
  $.ajax({
        method: "POST",
        url: "{{ URL::to("/") }}/dash/admin/pedidos/"+id,
        data:{'_token':'{{ csrf_token() }}'}
        })
        .done(function( approved ) {
            if(approved == 1){
                $(button).removeClass("btn-warning");
                $(button).addClass("btn-success");
                //$(button).text("fa-eye-slash");
                location.href = "/dash/admin/pedidos";
            }else{
                $(button).removeClass("btn-success");
                $(button).addClass("btn-danger");
                location.href = "/dash/admin/pedidos";
                //$(button).text("fa-eye");
            }
        });
        
        
}));


$(document).ready(function(){
        @if ($message = Session::get('ErrorInsert'))
                $("#modalEditar").modal('show');  
        
            @endif
      });

//Cargar datos en el formulario
$(".btnPedidoDetalles").click(function(){ 

$("#id_pedido").val($(this).data('id'));


});


$(".btnEditar").click(function(){ 

$("#idEdit").val($(this).data('id'));
});
</script>

@endsection