@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')
    
        <label for="username" >Nombre de usuario: </label>
        <input type="text" name="nombre" class="form-control" placeholder="nombre" value="{{$user->nombre}}">
        <br>

        <label for="nombre" >Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="nombre" value="{{$user->nombre}}">
        <br>

        <label for="ci" >Cédula de identidad</label>
        <input type="text" name="ci" class="form-control" placeholder="" value="{{$user->ci}}">
        <br>

        <label for="tipo" >Tipo de usuario:</label>
        <input type="text" name="tipo" class="form-control" placeholder="" value="{{$tipo->descripcion}}">
        <br>

        <label for="telefono" >Teléfono</label>
        <input type="text" name="telefono" class="form-control" placeholder="" value="{{$user->ci}}">
        <br>

        <label for="genero" >género</label>
        <input type="text" name="genero" class="form-control" placeholder="" value="{{$user->genero}}">
        <br>

        <label for="email" >género</label>
        <input type="text" name="email" class="form-control" placeholder="" value="{{$user->email}}">
        <br>

        <label for="email" >género</label>
        <input type="text" name="email" class="form-control" placeholder="" value="{{$user->email}}">
        <br>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
