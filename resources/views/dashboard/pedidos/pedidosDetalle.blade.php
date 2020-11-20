@extends('dashboard.dash')




@section('detallesPedido')

<div class="justify-content-center mr-auto ml-auto" style="margin-top: 5rem; width:80%">
    <h4><strong> Información</strong> </h4>
    
    @foreach ($datos as $dato)
        <h5>Nombre: {{ $dato->Name }}</h5>
        <h5>Correo: {{ $dato->Correo }}</h5>
        <h5>Fecha: {{ $dato->created_at }}</h5>
        <h5>Sucursal: {{ $dato->Sucursal }}</h5>
        <h5>Codigo: {{ $dato->codigo }}</h5>
    @endforeach
    
</div> 

<div class="row justify-content-center mr-auto ml-auto" style="margin-top: 5rem; width:80%" id="ContPedido">
      
        

    <div class="table-responsive">
        <table class="table table-hover text-center" id="" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th>Imagen</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Unidad</th>
              <th>Precio</th>
          </thead>

            @foreach ($carritoV as $item)

            {{-- @if ($item->id_user == Auth::user()->id) --}}
                <tr>
                    <td>
                        <img class="ml-auto mr-auto" style="height: 50px; widht: 60;" src="{{ asset('img/'.$item->Image) }}" alt="">
                    </td>
                    <td>{{ $item->Producto }}</td>
                    <td>{{ $item->cantidad  }}</td>
                    <td>{{ $item->unidad  }}</td>
                    <td>$ {{ number_format($item->totalPriceQuantity,2) }}</td>
                </tr>
            {{-- @else
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif --}}
                
             @endforeach 
          
        
        
              
  
  
          
           
          </tbody>
        </table>

        <div class="justify-content-right  float-right mr-auto ml-auto">
            @foreach ($pedi as $pedido)

            <h5 class="text-gray mb-2">Subtotal: $ {{ number_format($pedido->total,2,'.', ',') }}</h5>
            

                @if ($pedido->total_final == 'No Asignado')   
                    <h5 class="text-gray">Total Final: $ {{ $pedido->total_final }}</h5>
                @else
                    <h5 class="text-gray">Total Final: $ {{ number_format($pedido->total_final,2,'.', ',') }}</h5>
                @endif
            @endforeach
           
        </div>

        <div class="row justify-content-center mr-auto ml-auto" style="margin-top: 5rem;">
            {{$carritoV->links()}}
        </div>
    </div> 



<div class="row justify-content-center mr-auto ml-auto w-100"  id="">

</div>


</div>


@endsection





@section('scripts')


<script>


</script>

@endsection