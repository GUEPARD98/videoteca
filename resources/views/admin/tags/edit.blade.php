@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>editar categoria</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success"><strong>{{session('info')}}</strong> </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($tag,['route' => ['admin.tags.update',$tag],'method'=> 'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['placeholder'=> 'ingrese nombre' , 'class' => 'form-control']) !!}
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', null, ['placeholder'=> 'ingrese nombre' , 'class' => 'form-control','readonly']) !!}
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('color', 'Color') !!}
            {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
            @error('color')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Crear </button>
        {!! Form::close() !!}
    </div>
</div>@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src=" @vite(['public/vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js'])
">


</script>

<script>
    $(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});
</script>
@stop
