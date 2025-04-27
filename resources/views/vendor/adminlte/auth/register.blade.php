<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <!-- Main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login-9.css">

</head>
<body class="main">


@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif


@section('auth_body')



<!-- Login 9 - Bootstrap Brain Component -->
<section class="bg-primary py-3 py-md-5 py-xl-8 ">
  <div class="position-absolute w-100 h-100 top-0 start-0" style="
  background-image: 
    linear-gradient(to right, rgba(8, 77, 154, 0.9), rgba(8, 77, 154, 0.2) 20%, rgba(8, 77, 154, 0.2) 80%, rgba(8, 77, 154, 0.9)),
    url('images/pixelcut-export.jpeg'); 
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  opacity: 0.7;
  backdrop-filter: blur(5px);
  "></div>
    <div class="container  ">
      <div class="row gy-4 align-items-center">
        <div class="col-12 col-md-6 col-xl-7">
         
        </div>
        <div class="col-12 col-md-6 col-xl-5" >
          <div class="card border-0 rounded-4">
            <div class="card-body p-3 p-md-4 p-xl-5">

              <div class="col-12 col-xl-12">
                
              <div class="row">
                <div class="col-14">
                  <div class="mb-4" >
                    <h6>Registrese para iniciar sesión </h6>
                    
                  </div>
                </div>
              </div>
              <form action="{{ $register_url }}" method="post">
                @csrf
                <div class="row gy-3 overflow-hidden">
                 
                   <!-- Name input -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-primary border-0">
                    <i class="fa fa-user text-white"></i>
                </span>
            </div>
            <input type="text" name="name" class="form-control border-0 shadow-none" style="border-bottom: 1px solid #084d9a !important;"
                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
        </div>

        <!-- Email input -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-primary border-0">
                    <i class="fa fa-envelope text-white"></i>
                </span>
            </div>
            <input type="email" name="email" class="form-control border-0 shadow-none" style="border-bottom: 1px solid #084d9a !important;"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
        </div>

        <!-- Password input -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-primary border-0">
                    <i class="fa fa-lock text-white"></i>
                </span>
            </div>
            <input type="password" name="password" class="form-control border-0 shadow-none" style="border-bottom: 1px solid #084d9a !important;"
                   placeholder="{{ __('adminlte::adminlte.password') }}">
        </div>

        <!-- Password confirmation -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-primary border-0">
                    <i class="fa fa-lock text-white"></i>
                </span>
            </div>
            <input type="password" name="password_confirmation" class="form-control border-0 shadow-none" style="border-bottom: 1px solid #084d9a !important;"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">
        </div>
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
          <span class="fas fa-user-plus"></span>
          {{ __('adminlte::adminlte.register') }}
      </button>
              </form>

  
              <div class="row">
                <div class="col-12">
                  <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
                    <a href="{{ $login_url }}">
                  </a>
                  </div>
                </div>
              </div>
              <div class="row">
                <p class="my-0">
                  <a href="{{ $login_url }}">
                      {{ __('adminlte::adminlte.i_already_have_a_membership') }}
                  </a>
              </p>        
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>