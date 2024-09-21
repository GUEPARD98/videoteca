@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>crear categorias</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.categories.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', '', ['placeholder'=> 'ingrese nombre' , 'class' => 'form-control']) !!}
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', '', ['placeholder'=> 'ingrese nombre' , 'class' => 'form-control','readonly']) !!}
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Crear </button>
        {!! Form::close() !!}
    </div>
</div>

@stop
@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}" ">
</script>

<script>
    $(document).ready( function() {
  $(" #name").stringToSlug({ setEvents: 'keyup keydown blur' , getPut: '#slug' , space: '-' }); }); </script>
    @stop