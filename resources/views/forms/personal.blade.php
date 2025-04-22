
@extends('layouts.app')

@section('content')

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

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('personal.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="nombres">Nombres:</label>
                            <input type="text" name="nombres" id="nombres" value="{{ old('nombres') }}" required>
                        </div>
                        <div>
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos') }}">
                        </div>
                        <div>
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="dd/mm/yyyy" required>
                        </div>
                        <div>
                            <label for="cedula">Cédula:</label>
                            <input type="text" name="cedula" id="cedula" value="{{ old('cedula') }}" required>
                        </div>
                        <div>
                            <label for="nro_telefonico">Número Telefónico (02XX-XXXXXXX):</label>
                            <input type="text" name="nro_telefonico" id="nro_telefonico" value="{{ old('nro_telefonico') }}" required>
                        </div>
                        <div>
                            <label for="file_cedula">Cédula (JPG, PNG, PDF):</label>
                            <input type="file" name="file_cedula" id="file_cedula" required>
                        </div>
                        <button type="submit">Guardar Datos Personales</button>
                    </form>
                 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection