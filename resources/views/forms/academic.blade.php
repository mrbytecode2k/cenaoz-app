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
<div class="row justify-content-center">
    <div class="callout callout-info col-md-8 card">
        <h5><i class="fas fa-info"></i> Nota:</h5>
        El nombre y la foto asociados a tu cuenta de Google se registrarán cuando subas archivos y envíes este formulario. Tu correo no forma parte de tu respuesta.
        </div>
    <div class="col-md-8">
        <div class="card card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos Academicos</h3>
        </div>
        <div class="card-body">

    <form action="{{ route('academic.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>

            
            <label for="profesion" >Selecciona tu profesión:</label><br>
            <div>
                <select class="form-control" name="profesion" id="profesion">
                    <option value="Medico">Medico</option>
                    <option value="Licenciado">Licenciado</option>
                    <option value="Odontologo">Odontologo</option>
                    <option value="Veterinario">Veterinario</option>
                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                </select>            
        </div>
        <div>
            <label for="universidad">Indique la Universidad de Avala*:</label><br>
            <input class="form-control" type="text" name="universidad" id="universidad" value="{{ old('universidad') }}" required>
        </div>

        

<div>
    <label for="fecha_e">Fecha Emision:</label><br>
    <input class="form-control" type="text" name="fecha_e" id="fecha_e" value="{{ old('fecha_e') }}" required>
</div>
<hr>
        <div>
            <label for="file_titulo">Titulo de pregrado (en formatos de imagen JPG, PDF, DOC)*:</label><br>
            <input type="file" name="file_titulo" id="file_titulo" required>
        </div>
        <hr>

        <div>
            <label for="file_registro_prof">Registro profesional como profesional de salud emitido  por contraloría sanitaria (SACS)  (en formatos de imagen JPG, PDF, DOC):*</label>
            <br>
            <input type="file" name="file_registro_prof" id="file_registro_prof" required>
        </div>
        <hr>

        <div>
            <label for="file_cert_ozono">Certificado de Ozonoterapia (JPG, PDF, DOC):</label> <br>
            <input type="file" name="file_cert_ozono" id="file_cert_ozono" required>
        </div>
        <hr>

        <div>
            <label for="file_notas_ozono">Notas que avalen el certificado de Ozonoterapia (Optativo) en formatos JPG, PDF o DOC:</label><br>
            <input type="file" name="file_notas_ozono" id="file_notas_ozono">
        </div>
        <hr>

        <div>
            <label for="file_pensum">Programa o pensum académico de Ozonoterapia (Optativo) en formatos JPG, PDF o DOC:</label> <br>
            <input type="file" name="file_pensum" id="file_pensum">
        </div>
        <hr>

        <button type="submit" class="btn btn-primary float-right">Siguiente</button>
    </form>
 </div>
</div>

</div>
</div>

</div>
</div>
@endsection