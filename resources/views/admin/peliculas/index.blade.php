@extends('adminlte::page')

@section('title', 'Lista de Películas')

@section('content_header')
    <h1>Lista de Películas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.peliculas.create') }}" class="btn btn-primary mb-3">Agregar Nueva Película</a>

            @if (session('info'))
                <div class="alert alert-success mt-3">
                    {{ session('info') }}
                </div>
            @endif

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Autor</th>
                        <th>Duración (min)</th>
                        <th>Categoría</th>
                        <th>Lugar de Grabación</th>
                        <th>Fecha de Lanzamiento</th> <!-- Nueva columna agregada -->
                        <th>Portada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peliculas as $movie)
                        <tr>
                            <td>{{ $movie->titulo }}</td>
                            <td>{{ Str::limit($movie->descripcion, 50, '...') }}</td>
                            <td>{{ $movie->autor }}</td>
                            <td>{{ $movie->duracion ?? 'N/A' }}</td>
                            <td>{{ $movie->categoria ?? 'N/A' }}</td>
                            <td>{{ $movie->lugar_grabacion ?? 'N/A' }}</td>
                            <td>{{ $movie->fecha_creacion ? \Carbon\Carbon::parse($movie->fecha_creacion)->format('d/m/Y') : 'N/A' }}
                            </td> <!-- Mostrar fecha de lanzamiento -->
                            <td>
                                @if ($movie->poster_imagen)
                                    <img src="{{ asset($movie->poster_imagen) }}" width="100" alt="Portada">
                                @else
                                    <span>No disponible</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.peliculas.edit', $movie->id) }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                {!! Form::open([
                                    'route' => ['admin.peliculas.destroy', $movie->id],
                                    'method' => 'DELETE',
                                    'style' => 'display:inline;',
                                ]) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay películas disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                {{ $peliculas->links() }}
            </div>
        </div>
    </div>
@stop
