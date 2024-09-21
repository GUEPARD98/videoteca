@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between">

    <h1>Lista comentarios</h1>

</div>

@stop

@section('content')
<div>


    @if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong> </div>

    @endif
    <div class="card">


        <div class="card-header">
            <form action="{{route('admin.comments.index')}}" method="GET" class="d-flex">
                <input type="text" class="form-control" value="{{request('search')}}" name="search"
                    placeholder="Buscar">
                <button class="btn btn-primary">Buscar</button>
            </form>
        </div>

        @if ($comments->count() > 0)

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descripción</th>

                </tr>
            </thead>
            <tbody>


                @foreach ($comments as $comment)
                <tr>
                    <th scope="row">{{$comment->id}}</th>
                    <td>{{$comment->description}}</td>

                    <td width="10px">
                        @can('admin.posts.edit')
                        <a class="btn btn-primary btn-sm" href={{route('admin.comments.edit',$comment)}}>
                            Editar
                        </a>
                        @endcan

                    </td>
                    <td class="btn" width="10px">
                        @can('admin.posts.destroy')

                        <form action="{{route('admin.categories.destroy',$comment)}}" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Eliminar
                            </button>



                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @else

        <div class="card-body">
            <h4>No hay registros</h4>
        </div>

        @endif
    </div>

    <div class="card-footer">
        {{$comments->links()}}
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
