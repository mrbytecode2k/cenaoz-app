@extends('adminlte::page')
@section('content')
<br>



<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<x-app-layout>

    <div class="row justify-content-center">
        <div class="callout callout-info col-md-12 card">
            <h5><i class="fas fa-info"></i> Nota:</h5>
            El nombre y la foto asociados a tu cuenta de Google se registrarán cuando subas archivos y envíes este formulario. Tu correo no forma parte de tu respuesta.
            </div>
        <div class="col-md-12">
            <div class="card card card-primary">
                <div class="card-header">
                        <h3 class="card-title">Datos Personales</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('personal.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <br>
                        
                       
                        <div class="form-group">
                            <label for="nombres">Nombres:</label>
                            <div class="input-group">
                                <input type="text" name="nombres" class="form-control" 
                                       id="nombres" value="{{ old('nombres') }}" 
                                       placeholder="Ingrese sus nombres" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="apellidos">Apellidos:</label>
                            <div class="input-group">
                                <input type="text" name="apellidos" class="form-control" 
                                       id="apellidos" value="{{ old('apellidos') }}" 
                                       placeholder="Ingrese sus apellidos" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lugar_nac">Lugar de Nacimiento:</label>
                            <div class="input-group">
                                <input type="text" name="lugar_nac" class="form-control" 
                                       id="lugar_nac" value="{{ old('lugar_nac') }}" 
                                       placeholder="Ingrese su lugar de nacimiento" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-globe"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
           
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" 
                                       placeholder="dd/mm/yyyy" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cedula">Cédula:</label>
                            <div class="input-group">
                                <input type="text" name="cedula" class="form-control numeric-only" 
                                       id="cedula" value="{{ old('cedula') }}" 
                                       placeholder="Ingrese su cédula" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-calculator"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nro_telefonico">Número Telefónico:</label>
                            <div class="input-group">
                                <input type="text" name="nro_telefonico" class="form-control phone-mask" 
                                       id="nro_telefonico" value="{{ old('nro_telefonico') }}" 
                                       placeholder="02XX-XXXXXXX" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <div class="input-group">
                                <input type="text" name="direccion" class="form-control" 
                                       id="direccion" value="{{ old('direccion') }}" 
                                       placeholder="Ingrese su dirección" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-map-marker"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" 
                                       id="email" value="{{ old('email') }}" 
                                       placeholder="Ingrese su correo electrónico" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div >
                            <label class="input-group-text" for="file_cedula">Adjuntar Cedula de Identidad (JPG, PNG, PDF):</label>
                            <input type="file" name="file_cedula" class="form-control "id="file_cedula" lang="es" required>
                        </div>
                        
                        <br>
                        <button type="submit" class="btn btn-primary float-right">Siguiente</button>
                    </form>
                 
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>

@section('css')
    <!-- Add Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@stop

@section('js')
    <!-- Add Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
    
    <!-- Add jQuery Mask Plugin after your other scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#datepicker').datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                autoclose: true,
                todayHighlight: true,
                endDate: new Date(),
                clearBtn: true
            });
            
            // Phone mask for format 02XX-XXXXXXX
            $('.phone-mask').mask('0000-0000000', {
                placeholder: "02XX-XXXXXXX"
            });
            
            // Validate that it starts with '02'
            $('.phone-mask').on('keyup', function() {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length >= 2 && value.substring(0, 2) !== '02') {
                    $(this).val('');
                }
            });

            // Numeric only mask for cedula
            $('.numeric-only').mask('00000000', {
                reverse: true,
                placeholder: ""
            });
            
            // Prevent non-numeric input
            $('.numeric-only').on('keypress', function(e) {
                if (isNaN(String.fromCharCode(e.which)) && e.which != 8) {
                    e.preventDefault();
                }
            });
        });
    </script>
@stop

@endsection