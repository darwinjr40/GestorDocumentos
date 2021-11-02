@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Vista principal de los procesos y donde se pueden crear procesos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('procesos.create')}}" class="btn btn-primary btb-sm">Registrar Proceso</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="procesos" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre de proceso</th>
                    <th scope="col">jurisdiccion</th>
                    <th scope="col">carátula</th>
                    <th scope="col">tipo</th>
                    <th scope="col">objeto</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($procesos as $proceso)
                    <tr>
                        <td>{{$proceso->id}}</td>
                        <td>{{$proceso->nombre}}</td>
                        <td>{{$proceso->jurisdiccion}}</td>
                        <td>{{$proceso->caratula}}</td>
                        <td>{{$proceso->tipo}}</td>
                        <td>{{$proceso->objeto}}</td>
                        <td>{{$proceso->objeto}}</td>


                        <td>
                            <form action="{{route('procesos.destroy', $proceso)}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{route('procesos.show', $proceso)}}" class="btn btn-info btn-sm">Ver Detalles<a>    
                                <a href="{{route('procesos.edit', $proceso)}}" class="btn btn-info btn-sm">Editar<a>
                                @can('editar proceso')
                                @endcan
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button> 
                                @can('eliminar usuario')
                                @endcan
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css"> --}}
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#procesos').DataTable();
    });
</script>
@stop

