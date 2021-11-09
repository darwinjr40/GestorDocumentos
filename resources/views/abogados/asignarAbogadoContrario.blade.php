@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registro del abogado contrario del proceso {{$proceso->id}}</h1>
@stop

@section('content')
    <form action="{{route('abogados.store')}}" method="POST">
        @csrf

        <label for="ci" >Ingrese el numero de cédula de identidad del abogado</label>
        <input type="text" name="ci" class="form-control" placeholder="">
        @error('ci')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>
{{-- 
        <label for="tipo">seleccione a que tipo de parte pertenece el procurador</label>
        <select name="tipo" id="" class="form-control">
            <option value="demandante">demandante</option>
            <option value="demandado">demandado</option>
        </select>
        @error('tipo')
        <small>*{{$message}}</small>
        <br><br>
        @enderror --}}

        

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
