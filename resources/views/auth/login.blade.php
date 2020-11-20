@extends('layouts.app')

@section('content')

<div class="container">
{{-- ---------------------------------------------------------------------------------------------- --}}

 <div class="row justify-content-center">
  

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">


            <form method="POST" action="{{ route('login') }}">
                @csrf

          <!-- Nested Row within Card Body -->
          <div class="row">
            {{-- IMAGEN DE login --}}
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
              <button class="btn btn-outline-success col-lg-2 col-md-2 col-sm-2 mt-3"><a href="/" class=" fas fa-arrow-left" style="color: grey"></a></button>
              
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">{{ __('Login') }}</h1>
                </div>
                
                

                    {{-- CORREO --}}
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    id="email" aria-describedby="emailHelp" placeholder="{{ __('E-Mail Address') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>


        
                    {{-- CONTRASE;A --}}
                  <div class="form-group">
                    <input for="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="{{ __('Password') }}"
                    name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>


                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">{{ __('Remember Me') }}</label>
                    </div>
                  </div>


                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Login') }}
                  </button>

                     


{{-- ********************* --}}

 <!-- Right Side Of Navbar -->
 {{-- <ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul> --}}
{{-- ********************* --}}

                  <hr>

                  {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                  </a>

                  <a href="index.html" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                  </a> --}}

               
                <hr>
        
                <div class="text-center">
                    @if (Route::has('password.request'))
                            <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </div>

                <div class="text-center">
                  <a class="small" href="{{ route('register') }}">Crear una cuenta</a>
                </div>

            </form>

              </div>
            </div>
          </div>
        </div>
      </div>


@endsection



@section('scipts')
    <!-- Bootstrap core JavaScript-->
<script src="{{asset('dashboard-archivos/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashboard-archivos/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{-- <script src="{{asset('/principal-archivos/assets/mail/jqBootstrapValidation.js')}}"></script> --}}
<!-- Core plugin JavaScript-->
<script src="{{asset('dashboard-archivos/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('dashboard-archivos/js/sb-admin-2.min.js')}}"></script>
@endsection