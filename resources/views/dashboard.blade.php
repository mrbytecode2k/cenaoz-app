@extends('adminlte::page')
@section('title', 'Centro Cientifico Nacional del Ozono')
@section('content_header')

@stop


@section('content')
    <div class="content d-flex align-items-center min-vh-100">
        <div class="container-fluid">
            <div class="row justify-content-center m-0">
                <div class="col-md-11">
                    @if(session('success'))
                        <div id="asyncAlert" class="linkedin-card success-alert">
                            <div class="card-header">
                                <div class="header-content">
                                    <h4>Notificación del Sistema</h4>
                                    <div class="header-icon">
                                        <i class="fa fa-check-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert-content">
                                    <div class="alert-title">
                                        <h5>¡Proceso Exitoso!</h5>
                                    </div>
                                    <div class="alert-details">
                                        <ul>
                                            <li><i class="fa fa-check-circle"></i> Su solicitud está siendo procesada</li>
                                            <li><i class="fa fa-file-alt"></i> Los documentos están en revisión</li>
                                            <li><i class="fa fa-clock"></i> Será notificado mediante su correo registrado</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small>
                                    <i class="fa fa-envelope"></i> 
                                    Contacto: <a href="mailto:info@cenaoz.com">info@cenaoz.com</a>
                                </small>
                            </div>
                        </div>
                    @else
                        <div id="asyncAlert" class="linkedin-card info-alert">
                            <div class="card-header">
                                <div class="header-content">
                                    <h4>Notificación del Sistema</h4>
                                    <div class="header-icon">
                                        <i class="fa fa-info-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert-content">
                                    <div class="alert-title">
                                        <h5>Información Importante</h5>
                                    </div>
                                    <div class="alert-details">
                                        <ul>
                                            <li><i class="fa fa-check-circle"></i> Su solicitud está siendo procesada</li>
                                            <li><i class="fa fa-file-alt"></i> Los documentos están en revisión</li>
                                            <li><i class="fa fa-clock"></i> Será notificado mediante su correo registrado</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small>
                                    <i class="fa fa-envelope"></i> 
                                    Contacto: <a href="mailto:info@cenaoz.com">info@cenaoz.com</a>
                                </small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add CSS for animations -->
    <style>
        .content {
            padding: 0 !important;
            margin-left: 0 !important;
            width: 100% !important;
            min-height: calc(100vh - 120px) !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container-fluid {
            width: 95% !important;
            max-width: 1400px !important;
            margin: 0 auto !important;
        }

        .linkedin-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #f5f5f5, #fff);
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-content h4 {
            margin: 0;
            color: #333;
            font-weight: 600;
        }

        .header-icon {
            font-size: 24px;
        }

        .success-alert .header-icon {
            color: #28a745;
        }

        .info-alert .header-icon {
            color: #084d9a;
        }

        .card-body {
            padding: 25px;
        }

        .alert-title {
            margin-bottom: 20px;
        }

        .alert-title h5 {
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .alert-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
        }

        .alert-details ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .alert-details li {
            display: flex;
            align-items: center;
            margin: 12px 0;
            color: #555;
            font-size: 1.1em;
        }

        .alert-details li i {
            margin-right: 15px;
        }

        .success-alert .alert-details li i {
            color: #28a745;
        }

        .info-alert .alert-details li i {
            color: #084d9a;
        }

        .card-footer {
            padding: 15px 20px;
            background: #f8f9fa;
            border-top: 1px solid #eee;
        }

        .card-footer a {
            color: #084d9a;
            text-decoration: none;
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        /* Override AdminLTE styles */
        .content-wrapper {
            display: flex !important;
            align-items: center !important;
            min-height: calc(100vh - 120px) !important;
        }

        @media (max-width: 768px) {
            .container-fluid {
                width: 92% !important;
            }
            
            .content {
                min-height: calc(100vh - 100px) !important;
            }
            
            .linkedin-card {
                margin: 10px;
            }

            .card-body {
                padding: 15px;
            }
        }
    </style>

    <!-- Add JavaScript for dismiss animation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.querySelector('.alert');
            const closeButton = alert.querySelector('.close');

            closeButton.addEventListener('click', function() {
                alert.classList.add('fade-out');
                setTimeout(() => {
                    alert.remove();
                }, 500);
            });
        });
    </script>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("test scripting!"); </script>
@stop
