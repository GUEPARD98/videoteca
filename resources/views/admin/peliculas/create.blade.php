@extends('adminlte::page')

@section('title', 'Agregar Nueva Película')

@section('content_header')
    <h1>Agregar Nueva Película</h1>
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

            {!! Form::open(['route' => 'admin.peliculas.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {!! Form::label('titulo', 'Título') !!}
                {!! Form::text('titulo', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción') !!}
                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 4]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('autor', 'Autor') !!}
                {!! Form::text('autor', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('duracion', 'Duración (min)') !!}
                {!! Form::number('duracion', null, ['class' => 'form-control', 'min' => 1]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Categoria') !!}
                {!! Form::select('category_id', $categories, null, [
                    'class' => 'form-control',
                    'placeholder' => 'Selecciona una categoria',
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('lugar_grabacion', 'Lugar de Grabación') !!}
                {!! Form::text('lugar_grabacion', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('poster_imagen', 'Imagen de Póster') !!}
                {!! Form::file('poster_imagen', ['class' => 'form-control']) !!}
                @if ($errors->has('poster_imagen'))
                    <span class="text-danger">{{ $errors->first('poster_imagen') }}</span>
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

            {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
