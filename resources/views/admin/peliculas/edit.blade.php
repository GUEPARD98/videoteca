@extends('adminlte::page')

@section('title', 'Editar Película')

@section('content_header')
    <h1>Editar Película</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($pelicula, [
                'route' => ['admin.peliculas.update', $pelicula->id],
                'method' => 'PUT',
                'enctype' => 'multipart/form-data',
            ]) !!}

            <div class="form-group">
                {!! Form::label('titulo', 'Título') !!}
                {!! Form::text('titulo', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción') !!}
                {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('autor', 'Autor') !!}
                {!! Form::text('autor', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('duracion', 'Duración (min)') !!}
                {!! Form::number('duracion', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('categoria', 'Categoría') !!}
                {!! Form::text('categoria', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lugar_grabacion', 'Lugar de Grabación') !!}
                {!! Form::text('lugar_grabacion', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('poster_imagen', 'Imagen de Póster') !!}
                {!! Form::file('poster_imagen', ['class' => 'form-control']) !!}
                @if ($pelicula->poster_imagen)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $pelicula->poster_imagen) }}" width="150" alt="Portada actual">
                    </div>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('video_url', 'URL del Video') !!}
                {!! Form::text('video_url', null, ['class' => 'form-control']) !!}

            </div>
            <div class="form-group">
                {!! Form::label('fecha_creacion', 'Fecha de Lanzamiento') !!}
                {!! Form::date('fecha_creacion', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
