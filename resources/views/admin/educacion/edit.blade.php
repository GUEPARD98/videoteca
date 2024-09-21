@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>editar articulo programa</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success"><strong>{{session('info')}}</strong> </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($educacion,['route' => ['admin.educacion.update',$educacion],'autocomplete'=> 'off','files'=>
        true,'method'=> 'put',]) !!}

        {!! Form::hidden('user_id', auth()->user()->id) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text(' name', $educacion->name, ['placeholder'=> 'ingrese nombre' , 'class' => 'form-control'])
            !!}
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>


        <div class="form-group">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', null, ['placeholder'=> 'ingrese nombre' , 'class' => 'form-control','readonly']) !!}
            @error('slug')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        {!! Form::hidden('category_id', 3) !!}


        <div class="form-group">
            <div class="font-weight-blold">Etiquetas</div>
            @foreach ($tags as $tag)
            <label>
                {!! Form::checkbox('tags[]', $tag->id, null) !!}
                {{$tag->name}}
            </label>
            @endforeach
            @error('tags')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <div class="font-weight-blold">Estado</div>
            <label>
                {!! Form::radio('status', 1 , true) !!}
                Borrador
            </label>

            <label>
                {!! Form::radio('status', 2) !!}
                Publicado
            </label>
            @error('status')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="img-wrapper">
                    @if ($educacion->image)

                    <img id="picture" src="{{Storage::url($educacion->image->url)}}" alt="{{$educacion->name}}">
                    @else
                    <img src="" alt="no tiene ">
                    @endif

                </div>

            </div>
            <div class="col">
                <div class="form-group">
                    {!! Form::label('file', 'imagen que se mostrara en el artitulo') !!}
                    {!! Form::file('file', ['class'=> 'form-control-file','accept'=> 'image/*']) !!}
                </div>

                @error('file')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('extract', 'Extracto') !!}
            {!! Form::textarea('extract', null, ['class'=> 'form-control']) !!}

            @error('extract')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Cuerpo') !!}
            {!! Form::textarea('body', null, ['class'=> 'form-control']) !!}

            @error('body')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col">
            @if ($educacion->archivo)
            <a target="_blank" href="{{Storage::url($educacion->archivo->url)}}">Ver archivo</a>

            @else
            <span>No tiene archivo</span>
            @endif

            <div class="form-group">
                {!! Form::label('file2', 'Archivo') !!} <span>(Opcional)</span>
                {!! Form::file('file2', ['class'=> 'form-control-file','accept'=> 'pdf']) !!}
            </div>

            @error('file')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>



    {!! Form::submit('editar artitulo', ['class'=> 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
</div>


@stop

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>

@endpush

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}" ">
</script>
<script>
    $(document).ready( function() {
  $(" #name").stringToSlug({ setEvents: 'keyup keydown blur' , getPut: '#slug' , space: '-' }); }); </script>
    <script>
    document.getElementById('file').addEventListener('change', cambiarImagen)

    function cambiarImagen(e) {

        var file= e.target.files[0];
        var reader= new FileReader();

        reader.onload= (e)=>{
            document.getElementById('picture').setAttribute('src',e.target.result);
        }

        reader.readAsDataURL(file);



    }

</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop

@section('css')
<style>
    .img-wrapper {
        position: relative;

    }



    .img-wrapper img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>
@stop