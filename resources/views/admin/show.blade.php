@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Archivos de {{ $personalData->nombres }} {{ $personalData->apellidos }}</h1>

    <ul class="list-group">
        <li class="list-group-item">
            Cédula 
            <a href="#" data-toggle="modal" data-target="#modalCedula" class="float-right">
                <i class="fas fa-search"></i> <!-- Ícono de lupa -->
            </a>
        </li>
        <li class="list-group-item">
            Título 
            <a href="#" data-toggle="modal" data-target="#modalTitulo" class="float-right">
                <i class="fas fa-search"></i>
            </a>
        </li>
        <li class="list-group-item">
            Registro Profesional 
            <a href="#" data-toggle="modal" data-target="#modalRegistro" class="float-right">
                <i class="fas fa-search"></i>
            </a>
        </li>
        <li class="list-group-item">
            Certificado de Ozono 
            <a href="#" data-toggle="modal" data-target="#modalCertOzon" class="float-right">
                <i class="fas fa-search"></i>
            </a>
        </li>
        <li class="list-group-item">
            Notas del Certificado 
            <a href="#" data-toggle="modal" data-target="#modalNotas" class="float-right">
                <i class="fas fa-search"></i>
            </a>
        </li>
        <li class="list-group-item">
            Pensum 
            <a href="#" data-toggle="modal" data-target="#modalPensum" class="float-right">
                <i class="fas fa-search"></i>
            </a>
        </li>
    </ul>

    <a href="{{ route('admin.index') }}" class="btn btn-primary mt-3">Regresar</a>
</div>

<!-- Modal para Cédula -->
<div class="modal fade" id="modalCedula" tabindex="-1" role="dialog" aria-labelledby="modalCedulaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCedulaLabel">Cédula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{ Storage::url($personalData->file_cedula) }}" style="width:100%; height:400px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Título -->
<div class="modal fade" id="modalTitulo" tabindex="-1" role="dialog" aria-labelledby="modalTituloLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTituloLabel">Título</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{ Storage::url($personalData->file_titulo) }}" style="width:100%; height:400px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Registro Profesional -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegistroLabel">Registro Profesional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{ Storage::url($personalData->file_registro_prof) }}" style="width:100%; height:400px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Certificado de Ozono -->
<div class="modal fade" id="modalCertOzon" tabindex="-1" role="dialog" aria-labelledby="modalCertOzonLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCertOzonLabel">Certificado de Ozono</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{ Storage::url($personalData->file_cert_ozono) }}" style="width:100%; height:400px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Notas del Certificado -->
<div class="modal fade" id="modalNotas" tabindex="-1" role="dialog" aria-labelledby="modalNotasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNotasLabel">Notas del Certificado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{ Storage::url($personalData->file_notas_ozono) }}" style="width:100%; height:400px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Pensum -->
<div class="modal fade" id="modalPensum" tabindex="-1" role="dialog" aria-labelledby="modalPensumLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPensumLabel">Pensum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="{{ Storage::url($personalData->file_pensum) }}" style="width:100%; height:400px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection
