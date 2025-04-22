@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Panel de Administración</h1>
    
    <form action="{{ route('admin.search') }}" method="GET">
        <input type="text" name="query" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <tr>
                <td>{{ $record->nombres }}</td>
                <td>{{ $record->apellidos }}</td>
                <td>
                    <a href="{{ route('admin.show', $record->id) }}">Ver Archivos</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
