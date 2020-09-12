@include('dashboard.dash')



@section('sucu')
    <h1>hola</h1>
@endsection






@section('jok')
    

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


  </script>

@endsection