@extends('dashboard.dash')




@section('pedidosadmin')
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
                      <td style="color: white">{{ $pedido ->total }}</td>
                      <td style="color: white">Falta</td>
                      <td style="color: white">{{ $pedido ->codigo }}</td>
                     

                                     
                      <td>    

                        @if (Auth::user()->rol <= 2)                                               
                          <button data-id="{{ $pedido->id }}"
                              class="estado btn btn-{{ $pedido->status == 1 ? "success" : "warning"}}">                          
                              <i class="fa {{ $pedido->status == 1 ? "fa-eye" : "fa-eye-slash"}}"></i>
                          </button>    
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


//Cargar datos en el formulario
$(".btnPedidoDetalles").click(function(){ 

$("#id_pedido").val($(this).data('id'));


});


</script>

@endsection