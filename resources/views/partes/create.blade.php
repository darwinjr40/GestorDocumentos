@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registro de parte {{$proceso->id}}</h1>
@stop

@section('content')
    <form action="{{route('partes.store')}}" method="POST">
        @csrf
        <label for="nombre" >Ingrese el nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="nombre">
        @error('nombre')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <label for="ci" >Ingrese el numero de cédula de identidad</label>
        <input type="text" name="ci" class="form-control" placeholder="">
        @error('ci')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <label for="tipo">seleccione el tipo</label>
        <select name="tipo" id="" class="form-control">
            <option value="demandante">demandante</option>
            <option value="demandado">demandado</option>
        </select>
        @error('tipo')
        <small>*{{$message}}</small>
        <br><br>
        @enderror

        <label for="fechaNac">Fecha de nacimiento:</label>
        <input type="date" name="fechaNac">
        <br>

        <label for="sexo">seleccione el sexo</label>
        <select name="sexo" id="" class="form-control">
            <option value="masculino">masculino</option>
            <option value="femenino">femenino</option>
        </select>
        @error('sexo')
        <small>*{{$message}}</small>
        <br><br>
        @enderror

        <label for="domicilio" >Ingrese el domicilio</label>
        <input type="text" name="domicilio" class="form-control" placeholder="Av/calle/número de casa">
        @error('domicilio')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <label for="email" >Ingrese el email</label>
        <input type="text" name="email" class="form-control" placeholder="">
        @error('email')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <label for="telefono" >Ingrese el telefono</label>
        <input type="text" name="telefono" class="form-control" placeholder="">
        @error('telefono')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <input type="number" name="procesoId" hidden readonly value="{{$proceso->id}}">

        <button  class="btn btn-danger btn-sm" type="submit">Registrar parte</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
