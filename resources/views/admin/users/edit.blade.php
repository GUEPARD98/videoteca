@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Asignar rol</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success"><strong>{{session('info')}}</strong> </div>
@endif
<div class="card p-2 ">
    <div class="card-body">
        <p class="h5"> Nombre:</p>
        <p class="form-control"> {{$user->name}}</p>
    </div>

    {!! Form::model($user,['route' => ['admin.users.update',$user],'method'=> 'put']) !!}

    @foreach ($roles as $rol)
    <div class="m-2">
        <label for="">
            {!! Form::checkbox('roles[]', $rol->id, null, ['class'=> 'mr-1']) !!}
            {{$rol->name}}
        </label>
    </div>
    @endforeach

    {!! Form::submit('asignar rol', ['class'=> 'btn btn-primary']) !!}

    {!! Form::close() !!}

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
