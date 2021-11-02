@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalle del proceso {{$proceso->id}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-sm-6">
        <label for="nombre" >Nombre:</label>
        <input type="text" value="{{$proceso->nombre}}" name="nombre" class="form-control" placeholder="nombre" readonly>
    </div>
    <div class="col-sm-6">
        <label for="caratula" >Carátula:</label>
        <input type="text" value="{{$proceso->caratula}}" name="caratula" class="form-control" placeholder="nombre" readonly>

    </div>
    <div class="col-sm-6">
        <label for="jurisdiccion">Jurisdicción</label>
        <input type="text" value="{{$proceso->jurisdiccion}}" name="jurisdiccion" class="form-control" placeholder="nombre" readonly>
        
    </div>
    <div class="col-sm-6">
        <label for="tipo" >Tipo de proceso: </label>
        <input type="text" value="{{$proceso->tipo}}" name="tipo" class="form-control" placeholder="nombre" readonly>
        
    </div>
    <div class="col-sm-6">
        <label for="objeto" >Objeto</label>
        <input type="text" value="{{$proceso->objeto}}" name="objeto" class="form-control" placeholder="nombre" readonly>
        
    </div>
    
    
    
</div>
<br>

{{-- ACTUACIONES --}}
<div class="card">
    <div class="card-header">
        <a href="{{-- {{ route('procuradores.create2', $proceso->id)}} --}}" {{-- class="btn btn-primary btb-sm" --}}>Actuaciones del caso</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="actuaciones" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">titulo</th>
                    <th scope="col">tipo</th>
                    <th scope="col">tipoArchivo</th>
                    <th scope="col">fecha subida</th>
                    <th scope="col">accion</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($actuaciones as $actuacion)
                    
                <tr>
                    <td>{{$actuacion->id}}</td>
                    <td>{{$actuacion->titulo}}</td>
                    <td>{{$actuacion->tipo}}</td>
                    <td>{{$actuacion->tipoArchivo}}</td>
                    <td>{{$actuacion->created_at}}</td>
                    <td>
                        <a href="" target="_blank">Abrir archivo</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- REGISTRO DE PARTES --}}
<div class="col-sm-12">
    <div>
        <div class="card">
            <div class="card-header">
                <a href="{{route('partes.create2', $proceso->id)}}" class="btn btn-secondary btb-sm">Registrar Parte</a>
            </div>
            <div {{-- class="card" --}}>
                <div class="card-body">
                    <table class="table table-striped" id="partes" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ci</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">tipo</th>
                                <th scope="col">telefono</th>
                                <th scope="col">tipo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
            
                        <tbody>
                            @foreach ($partes as $parte)
                                <tr>
                                    <td>{{$parte->ci}}</td>
                                    <td>{{$parte->nombre}}</td>
                                    <td>{{$parte->tipo}}</td>
                                    <td>{{$parte->telefono}}</td>
                                    <td>{{$parte->tipo}}</td>
            
                                    <td>
                                        <form action="{{route('partes.destroy', $parte->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('partes.show', $parte->id)}}" class="btn btn-secondary btn-sm">Ver Detalles<a>    
                                            <a href="{{route('partes.edit', $parte->id)}}" class="btn btn-secondary btn-sm">Editar<a>
                                            @can('editar parte')
                                            @endcan
                                            <button class="btn btn-secondary btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button> 
                                            @can('eliminar parte')
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


        


{{-- PROCURADORES --}}
<div class="card">
    <div class="card-header">
        <a href="{{route('procuradores.create2', $proceso->id)}}" class="btn btn-primary btb-sm">Registrar Procurador</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="procuradores" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">userId</th>
                    <th scope="col">proceso</th>
                    <th scope="col">tipo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($procuradores as $procurador)
                    
                <tr>
                    <td>{{$procurador->nombre}}</td>
                    <td>{{$procurador->procesoId}}</td>
                    <td>{{$procurador->tipo}}</td>
                    <td>
                        <form action="{{route('procuradores.destroy2', ['procesoId' => $proceso->id,'userId'=>$procurador->userId])}}" method="post">
                            @csrf
                            @method('delete')
                            {{-- <a href="{{route('procuradores.show', $procurador->id)}}" class="btn btn-info btn-sm">Ver Detalles<a>     --}}
                                {{-- <a href="{{route('procuradores.edit', $procurador->id)}}" class="btn btn-info btn-sm">Editar<a> --}}
                                    @can('editar procurador')
                                    @endcan
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button> 
                                    @can('eliminar procurador')
                                    @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div>
    @if ($proceso->userId == $user->id)
    <a href="{{route('abogados.asignarProcurador', $proceso->id)}}" class="btn btn-primary btb-sm">Registrar abogado parte contraria</a>
        
    @else
    <a href="" class="btn btn-primary btb-sm"></a>
        
    @endif

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#partes').DataTable();
        $('#procuradores').DataTable();
        $('#actuaciones').DataTable(){
            "bSort" : false,
        }

    });
</script>
@stop
