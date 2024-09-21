@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Lista users</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success"><strong>{{session('info')}}</strong> </div>

@endif

<div class="card">

    <div class="card-header">
        <form action="{{route('admin.users.index')}}" method="GET" class="d-flex">
            <input type="text" class="form-control" value="{{request('search')}}" name="search" placeholder="Buscar">
            <button class="btn btn-primary">Buscar</button>
        </form>
    </div>

    @if ($users->count() > 0)

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>

            </tr>
        </thead>
        <tbody>


            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>

                <td width="10px">
                    @can('admin.users.edit')

                    <a class="btn btn-primary btn-sm" href={{route('admin.users.edit',$user)}}>
                        Editar
                    </a>
                    @endcan

                </td>
                <td class="btn" width="10px">
                    @can('admin.users.destroy')

                    <form action="{{route('admin.users.destroy',$user)}}" method="POST">
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
    {{$users->links()}}
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
