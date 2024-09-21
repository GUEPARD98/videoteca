@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div>

        <div class="small-box bg-gradient-success">
            <div class="inner">
                <h3>{{ $users }}</h3>
                <p>Usuarios registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-solid fa-users"></i>>
            </div>
            <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                Ver todos los usuarios <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $posts }}</h3>
                <p>Numero de articulos</p>
            </div>
            <div class="icon">
                <i class="fas fa-regular fa-newspaper"></i>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="small-box-footer">
                ver articulos <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>


        <div class="small-box " style="background: #A6123A">
            <div class="inner">
                <h3 class="text-white">{{ $tags }}</h3>
                <p class="text-white">Numero de etiquetas</p>
            </div>
            <div class="icon">
                <i class="fas fa-solid fa-tags"></i>
            </div>
            <a href="{{ route('admin.tags.index') }}" class="small-box-footer">
                ver etiquetas <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

        {{--
    <div class="small-box " style="background: #71A63C">
        <div class="inner">
            <h3 class="text-white">{{$categories}}</h3>
            <p class="text-white">Numero de categorias</p>
        </div>
        <div class="icon">
            <i class="fas fa-solid fa-barcode"></i>
        </div>
        <a href="{{route('admin.categories.index')}}" class="small-box-footer">
            ver categorias <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div> --}}

        <div class="small-box " style="background: #71A63C">

            <div class="icon">
                <i class="fas fa-solid fa-barcode"></i>
            </div>
            <a href="{{ route('admin.categories.index') }}" class="small-box-footer">
                ver comentarios <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

        <div class="small-box " style="background: #A6123A">
            <div class="inner">
                <h3 class="text-white">{{ $documents }}</h3>
                <p class="text-white">Numero de archivos</p>
            </div>
            <div class="icon">
                <i class="fas fa-solid fa-barcode"></i>
            </div>
            <a href="{{ route('admin.archivos.index') }}" class="small-box-footer">
                ver archivos <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
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
