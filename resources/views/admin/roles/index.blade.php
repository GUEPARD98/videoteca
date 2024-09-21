@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between">

    <h1>Lista roles</h1>

    @can('admin.roles.create')

    <a class=" btn btn-secondary " href="{{route('admin.roles.create')}}">Crear
        roles</a>
    @endcan

</div>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success"><strong>{{session('info')}}</strong> </div>

@endif
<div class="card">


    <div class="card-header">
        <form action="{{route('admin.roles.index')}}" method="GET" class="d-flex">
            <input type="text" class="form-control" value="{{request('search')}}" name="search" placeholder="Buscar">
            <button class="btn btn-primary">Buscar</button>
        </form>
    </div>
    @if ($roles->count() > 0)

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>

            </tr>
        </thead>
        <tbody>


            @foreach ($roles as $role)
            <tr>
                <th scope="row">{{$role->id}}</th>
                <td>{{$role->name}}</td>
                <td>{{$role->slug}}</td>

                <td width="10px">
                    @can('admin.roles.edit')
                    <a class="btn btn-primary btn-sm" href={{route('admin.roles.edit',$role)}}>
                        Editar
                    </a>

                    @endcan

                </td>
                <td class="btn" width="10px">
                    @can('admin.roles.destroy')
                    <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
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
    {{$roles->links()}}
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
