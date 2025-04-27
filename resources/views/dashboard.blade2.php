@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop


@section('content')
    {{-- Add this alert section for warnings --}}
    @if(session('info'))
        <div class="d-flex align-items-center justify-content-center min-vh-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div id="asyncAlert" class="custom-alert">
                            <div class="custom-alert-content">
                                <div class="alert-icon">
                                    <i class="fa fa-info-circle fa-2x"></i>
                                </div>
                                <div class="alert-body">
                                    <h4>Información Importante</h4>
                                    <div class="alert-details">
                                        <ul>
                                            <li><i class="fa fa-check-circle"></i> Su solicitud está siendo procesada</li>
                                            <li><i class="fa fa-file-alt"></i> Los documentos están en revisión</li>
                                            <li><i class="fa fa-clock"></i> Será notificado mediante su correo registrado</li>
                                        </ul>
                                    </div>
                                    <div class="alert-footer">
                                        <small>
                                            <i class="fa fa-envelope"></i> 
                                            Contacto: <a href="mailto:info@cenaoz.com">info@cenaoz.com</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Add CSS for animations -->
    <style>
        .custom-alert {
            background: linear-gradient(to right, #ffffff, #f8f9fa);
            border-left: 4px solid #084d9a;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            animation: slideIn 0.5s ease-out;
        }

        .custom-alert-content {
            display: flex;
            padding: 20px;
        }

        .alert-icon {
            color: #084d9a;
            padding-right: 20px;
            display: flex;
            align-items: flex-start;
        }

        .alert-body {
            flex: 1;
        }

        .alert-body h4 {
            color: #084d9a;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .alert-details {
            background: rgba(8, 77, 154, 0.05);
            padding: 15px;
            border-radius: 6px;
        }

        .alert-details ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .alert-details li {
            margin: 8px 0;
            color: #495057;
            display: flex;
            align-items: center;
        }

        .alert-details li i {
            color: #084d9a;
            margin-right: 10px;
        }

        .alert-footer {
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px solid rgba(8, 77, 154, 0.1);
            color: #6c757d;
        }

        .alert-footer a {
            color: #084d9a;
            text-decoration: none;
        }

        .alert-footer a:hover {
            text-decoration: underline;
        }

        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .custom-alert-content {
                flex-direction: column;
            }
            
            .alert-icon {
                margin-bottom: 15px;
                padding-right: 0;
            }
        }

        /* Added centering styles */
        .min-vh-100 {
            min-height: 100vh;
            padding: 2rem 0;
        }
        
        .custom-alert {
            width: 100%;
            margin: 0 auto;
        }
        
        /* Ensure the content area takes full height */
        #app, 
        .content-wrapper {
            min-height: 100vh !important;
        }
        
        /* Override any conflicting AdminLTE styles */
        .content-wrapper {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop