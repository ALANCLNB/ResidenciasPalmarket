


@extends('dashboard.dash')


@section('principal')

    @if (Auth::user()->estado == 1)
        {{-- <div class="textobienvenida w-100 h-100 ml-auto mr-auto mt-auto mb-auto">Bienvenido</div> --}}
        <img src="{{asset('/dashboard-archivos/img/fondobienvenida.jpg')}}" alt="" class="w-100 h-100 ml-auto mr-auto mt-auto mb-auto">
       

    @else
    <div class="container-fluid">
        
        <!-- 404 Error Text -->
        <div class="text-center" >
          <div class="error ml-auto mr-auto text-center mb-5" data-text="Ops">Ops</div>
          <p class="lead text-gray-800 mb-5">Su cuenta ha sido bloqueada temporalmente debido a que se infringido los términos de uso.</p>
          <p class="text-gray-500 mb-0">Para aclaraciones o reactivar su cuenta envíe un correo electrónico  a <a>supportPalmarket@gmail.com</a>.</p>
          
          <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        &larr; Regresar
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
        </div>

      </div>
    @endif




@endsection




@section('js')


    <script>
        console.log('Si jala pero no funciona la img')
    </script>    

@endsection