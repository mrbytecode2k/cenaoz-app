@extends('adminlte::page')
@section('title', 'Dashboard')


@section('content')

<div class="container">

   
 
<br>

<div class="row">
        <div class="col-sm-8 mb-3 mb-sm-0">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                Informacion Personal
                </div>
                <div class="card-body pt-0">
                <div class="row">
                <div class="col-7">
                <h3 class="lead"><b>{{ $personalData->nombres }} {{ $personalData->apellidos }}</b></h3>
                <p class="text-muted text-sm"><b>Profesion: </b> {{ $personalData->nombres }} </p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Lugar de Nacimiento: {{ $personalData->lugar_nac }}</li>
                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono: {{ $personalData->nro_telefonico }}</li>
              <br>
                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email: {{$personalData->email}} </li>
        
            </ul>
                </div>
                <div class="col-5 text-center">
                </div>
                </div>
                </div>
                <br>
                <br>
                
                <div class="card-footer">
                 <a href="{{ route('admin.index') }}" class="btn btn-primary mt-3">Regresar</a>
                 <a href="{{ route('forms.certificado',  $personalData->id) }}" class="btn btn-primary mt-3">Enviar Certificado</a>
                
                </div>
                </div>
                </div>
        </div>
       
        <div class="col-sm-8 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Documentos Cargados</h5>
                    <br>
                    <ul class="list-group">
                        <li class="list-group-item">
                            Cédula 
                            <a href="#"  data-toggle="modal" data-target="#modalCedula" class="float-right" >
                                <i class="fas fa-search" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver"></i> <!-- Ícono de lupa -->
                            </a>
                            <a href="{{ Storage::url($personalData->file_cert_ozono) }}" target="_blank"  class="float-right" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar">
                                <i class="fas  fa-download"></i> <!-- Ícono de lupa -->
                            </a>
                      
                        </li>
                        <li class="list-group-item">
                            Título 
                            <a href="#" data-toggle="modal" data-target="#modalTitulo" class="float-right">
                                <i class="fas fa-search"></i>
                            </a>
                            <a href="{{ Storage::url($personalData->file_titulo) }}" target="_blank"  class="float-right" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar">
                                <i class="fas  fa-download"></i> <!-- Ícono de lupa -->
                            </a>
        
                        </li>
                        <li class="list-group-item">
                            Registro Profesional 
                            <a href="#" data-toggle="modal" data-target="#modalRegistro" class="float-right">
                                <i class="fas fa-search"></i>
                            </a>
        
                            <a href="{{ Storage::url($personalData->file_registro_prof) }}" target="_blank"  class="float-right" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar">
                                <i class="fas  fa-download"></i> <!-- Ícono de lupa -->
                            </a>
        
                        </li>

                        <li class="list-group-item">
                            Certificado de Ozono 
                            <a href="#" data-toggle="modal" data-target="#modalCertOzon" class="float-right">
                                <i class="fas fa-search"></i>
                            </a>
                            <a href="{{ Storage::url($personalData->file_cert_ozono) }}" target="_blank"  class="float-right" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar">
                                <i class="fas  fa-download"></i> <!-- Ícono de lupa -->
                            </a>
                        </li>
                        <li class="list-group-item">
                            Notas del Certificado 
                            <a href="#" data-toggle="modal" data-target="#modalNotas" class="float-right">
                                <i class="fas fa-search"></i>
                            </a>
                            <a href="{{ Storage::url($personalData->file_notas_ozono) }}" target="_blank"  class="float-right" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar">
                                <i class="fas  fa-download"></i> <!-- Ícono de lupa -->
                            </a>
                        </li>
                        <li class="list-group-item">
                            Pensum 
                            <a href="#" data-toggle="modal" data-target="#modalPensum" class="float-right">
                                <i class="fas fa-search"></i>
                            </a>
        
                            <a href="{{ Storage::url($personalData->file_pensum) }}" target="_blank"  class="float-right" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Descargar">
                                <i class="fas  fa-download"></i> <!-- Ícono de lupa -->
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  

   
</div>

    </div>



    <div>

<!-- Modal para Cédula -->
<div class="modal fade" id="modalCedula" tabindex="-1" role="dialog"  aria-labelledby="modalCedulaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
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
    <div class="modal-dialog modal-xl" role="document">
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
    <div class="modal-dialog modal-xl" role="document">
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
    <div class="modal-dialog modal-xl" role="document">
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
    <div class="modal-dialog modal-xl" role="document">
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
    <div class="modal-dialog modal-xl" role="document">
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
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> $(document).ready(function() {
        $('#modalCedula').on('shown.bs.modal', function () {
            var iframe = $('#modalIframe');
            var modalBody = $(this).find('.modal-body');
    
            // Esperar a que el contenido del iframe se cargue
            iframe.on('load', function() {
                // Obtener las dimensiones del contenido del iframe
                var iframeDocument = iframe[0].contentDocument;
                var iframeBody = iframeDocument.body;
                var iframeWidth = iframeBody.scrollWidth;
                var iframeHeight = iframeBody.scrollHeight;
    
                // Ajustar el tamaño de la modal y del iframe
                modalBody.css({
                    'max-height': $(window).height() * 0.8,
                    'overflow-y': 'auto'
                });
                iframe.css({
                    'width': iframeWidth,
                    'height': iframeHeight
                });
            });
        });

        $('#modalTitulo').on('shown.bs.modal', function () {
            var iframe = $('#modalIframe');
            var modalBody = $(this).find('.modal-body');
    
            // Esperar a que el contenido del iframe se cargue
            iframe.on('load', function() {
                // Obtener las dimensiones del contenido del iframe
                var iframeDocument = iframe[0].contentDocument;
                var iframeBody = iframeDocument.body;
                var iframeWidth = iframeBody.scrollWidth;
                var iframeHeight = iframeBody.scrollHeight;
    
                // Ajustar el tamaño de la modal y del iframe
                modalBody.css({
                    'max-height': $(window).height() * 0.8,
                    'overflow-y': 'auto'
                });
                iframe.css({
                    'width': iframeWidth,
                    'height': iframeHeight
                });
            });
        });
        $('#modalRegistro').on('shown.bs.modal', function () {
            var iframe = $('#modalIframe');
            var modalBody = $(this).find('.modal-body');
    
            // Esperar a que el contenido del iframe se cargue
            iframe.on('load', function() {
                // Obtener las dimensiones del contenido del iframe
                var iframeDocument = iframe[0].contentDocument;
                var iframeBody = iframeDocument.body;
                var iframeWidth = iframeBody.scrollWidth;
                var iframeHeight = iframeBody.scrollHeight;
    
                // Ajustar el tamaño de la modal y del iframe
                modalBody.css({
                    'max-height': $(window).height() * 0.8,
                    'overflow-y': 'auto'
                });
                iframe.css({
                    'width': iframeWidth,
                    'height': iframeHeight
                });
            });
        });

        $('#modalCertOzon').on('shown.bs.modal', function () {
            var iframe = $('#modalIframe');
            var modalBody = $(this).find('.modal-body');
    
            // Esperar a que el contenido del iframe se cargue
            iframe.on('load', function() {
                // Obtener las dimensiones del contenido del iframe
                var iframeDocument = iframe[0].contentDocument;
                var iframeBody = iframeDocument.body;
                var iframeWidth = iframeBody.scrollWidth;
                var iframeHeight = iframeBody.scrollHeight;
    
                // Ajustar el tamaño de la modal y del iframe
                modalBody.css({
                    'max-height': $(window).height() * 0.8,
                    'overflow-y': 'auto'
                });
                iframe.css({
                    'width': iframeWidth,
                    'height': iframeHeight
                });
            });
        });

        $('#modalNotas').on('shown.bs.modal', function () {
            var iframe = $('#modalIframe');
            var modalBody = $(this).find('.modal-body');
    
            // Esperar a que el contenido del iframe se cargue
            iframe.on('load', function() {
                // Obtener las dimensiones del contenido del iframe
                var iframeDocument = iframe[0].contentDocument;
                var iframeBody = iframeDocument.body;
                var iframeWidth = iframeBody.scrollWidth;
                var iframeHeight = iframeBody.scrollHeight;
    
                // Ajustar el tamaño de la modal y del iframe
                modalBody.css({
                    'max-height': $(window).height() * 0.8,
                    'overflow-y': 'auto'
                });
                iframe.css({
                    'width': iframeWidth,
                    'height': iframeHeight
                });
            });
        });

        $('#modalPensum').on('shown.bs.modal', function () {
            var iframe = $('#modalIframe');
            var modalBody = $(this).find('.modal-body');
    
            // Esperar a que el contenido del iframe se cargue
            iframe.on('load', function() {
                // Obtener las dimensiones del contenido del iframe
                var iframeDocument = iframe[0].contentDocument;
                var iframeBody = iframeDocument.body;
                var iframeWidth = iframeBody.scrollWidth;
                var iframeHeight = iframeBody.scrollHeight;
    
                // Ajustar el tamaño de la modal y del iframe
                modalBody.css({
                    'max-height': $(window).height() * 0.8,
                    'overflow-y': 'auto'
                });
                iframe.css({
                    'width': iframeWidth,
                    'height': iframeHeight
                });
            });
        });

    
    
    }); 
    
    
    
    
    
    </script>
@stop



