@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>crear role</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.roles.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', '', ['placeholder'=> 'ingrese nombre' , 'class' => 'form-control']) !!}
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>


        <div class="form-group">


            @foreach ($permissions as $permission)
            <div>
                <label>
                    {!! Form::checkbox('permissions[]', $permission->id, ['class'=> 'mr-1']) !!}
                    {{$permission->description}}
                </label>
            </div>
            @endforeach
        </div>

        {!! Form::submit('crear role', ['class'=> 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

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
