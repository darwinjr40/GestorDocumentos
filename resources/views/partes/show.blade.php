@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar parte del proceso</h1>
@stop

@section('content')
        @method('put')
        @csrf
        <label for="nombre" >Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="nombre" value="{{$parte->nombre}}" readonly>
        @error('nombre')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <label for="ci" >Número de cédula de identidad</label>
        <input type="text" name="ci" class="form-control" placeholder="" value="{{$parte->ci}}" readonly>
        @error('ci')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>


        <label for="tipo">tipo:</label>
        <input type="text" name="tipo" class="form-control" value="{{$parte->tipo}}" readonly>

        <label for="fechaNac">Fecha de nacimiento:</label>
        <input type="text" class="form-control" name="fechaNac" value="{{$parte->fechaNac}}" readonly>
        <br>

        <label for="sexo">Sexo:</label>
        <input type="text" name="sexo" class="form-control" value="{{$parte->sexo}}" readonly>

        <label for="domicilio">Domicilio:</label>
        <input type="text" name="domicilio" class="form-control" value="{{$parte->domicilio}}" readonly>
        <br>

        <label for="email">Email:</label>
        <input type="text" name="email" class="form-control" value="{{$parte->email}}" readonly>
        <br>

        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" class="form-control" value="{{$parte->telefono}}" readonly>
        <br>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
