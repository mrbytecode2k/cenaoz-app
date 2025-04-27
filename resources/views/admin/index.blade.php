
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop



@section('content')
<div class="container">



<form action="{{ route('admin.search') }}" method="GET">
    <input type="text" name="query" placeholder="Buscar...">
    <button type="submit">Buscar</button>
</form>
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Projects</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 30%">
                        Participante
                    </th>
                    <th style="width: 30%">
                        Profesion
                    </th>
                    <th style="width: 8%" class="text-center">
                        Estatus Solicitud
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->nombres }} {{ $record->apellidos }} </td>
                        <td>{{ $record->profesion }}</td>
                        <td>{{ $record->Profesion }}</td>

     
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm"  href="{{ route('admin.show', $record->id) }}">
                                <i class="fas fa-folder">
                                </i>
                                Ver
                            </a>
                           </td>
                    </tr>
                    @endforeach
             
                    
                    
                </tr>
           </tbody>
        </table>
    </div>

</div>

</div>



@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!"); 
</script>
@stop