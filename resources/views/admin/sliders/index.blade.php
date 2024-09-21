@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between">

    <h1>Lista carrucel</h1>
    @can('admin.posts.create')
    <a class=" btn btn-secondary " href="{{route('admin.sliders.create')}}">Crear
        carrucel</a>

    @endcan

</div>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success"><strong>{{session('info')}}</strong> </div>

@endif
<div class="card">


    <div class="card-header">
        <form action="{{route('admin.sliders.index')}}" method="GET" class="d-flex">
            <input type="text" class="form-control" value="{{request('search')}}" name="search" placeholder="Buscar">
            <button class="btn btn-primary">Buscar</button>
        </form>
    </div>

    @if ($sliders->count() > 0)

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th colspan="2"> </th>
            </tr>
        </thead>
        <tbody>


            @foreach ($sliders as $slider)
            <tr class="d-flex justify-content-between">
                <div>

                    <th scope="row">{{$slider->id}}</th>
                    <td>{{$slider->name}}</td>

                </div>

                <div>


                    <td width="10px">
                        @can('admin.posts.edit')
                        <a class="btn btn-primary btn-sm" href="{{route('admin.sliders.edit',$slider)}}">
                            Editar
                        </a>
                        @endcan

                    </td>

                    <td class="btn" width="10px">
                        @can('admin.posts.destroy')

                        <form action="{{route('admin.sliders.destroy',$slider)}}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Eliminar
                            </button>



                        </form>

                        @endcan
                    </td>
                </div>
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
    {{$sliders->links()}}
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