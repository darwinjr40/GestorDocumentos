@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>para crear un nuevo proceso judidical</h1>
@stop

@section('content')
    <form action="{{route('procesos.store')}}" method="POST">
        @csrf
        <label for="nombre" >Ingrese el nombre del nuevo proceso</label>
        <input type="text" name="nombre" class="form-control" placeholder="nombre" value="{{old('nombre')}}">
        @error('nombre')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <label for="caratula" >Ingrese la carátula del proceso</label>
        <input type="text" name="caratula" class="form-control" value="{{old('caratula')}}">
        @error('caratula')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label for="jurisdiccion">seleccione el tipo de jurisdicción</label>
                <select name="jurisdiccion" id="" class="form-control">
                    <option value="civil">civil</option>
                    <option value="laboral">laboral</option>
                    <option value="penal">penal</option>
                </select>
                @error('jurisdiccion')
                <small>*{{$message}}</small>
                <br><br>
                @enderror

            </div>
            <div class="col-sm-3">
                <label for="tipo" >Seleccione el tipo de proceso</label>
                <select name="tipo" id="" class="form-control">
                    <option value="ejecutivo">ejecutivo</option>
                    <option value="especial">especial</option>
                    <option value="ordinario">ordinario</option>
                    <option value="sumario">sumario</option>
                </select>
                @error('tipo')
                <small>*{{$message}}</small>
                <br><br>
                @enderror

            </div>
        </div>


        <label for="objeto" >Seleccione el objeto</label>
        <select name="objeto" id="" class="form-control">
            <option value="accion ejecutiva">acción ejecutiva</option>
            <option value="accion preparatoria de juicio ejecutivo">acción preparatoria de juicio ejecutivo</option>
            <option value="cobro de alquileres">cobro de alquileres</option>
            <option value="ejecucion de resoluciones administrativas">ejecucion de resoluciones</option>
            <option value=""></option>
        </select>
        @error('objeto')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <label for="numeroCausa" >Ingrese el numero de causa asignado</label>
        <input type="text" name="numeroCausa" class="form-control" value="{{old('numeroCausa')}}">
        @error('numeroCausa')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <label for="tribunal" >Ingrese el tribunal</label>
        <input type="text" name="tribunal" class="form-control" value="{{old('tribunal')}}">
        @error('tribunal')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <label for="ciJuez" >Ingrese el ci del juez a cargo del proceso</label>
        <input type="text" name="ciJuez" class="form-control" value="{{old('ciJuez')}}">
        @error('ciJuez')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        {{-- <label for="fojas">Ingrese la cantidad de fojas</label>
        <input type="text" name="cantidadFojas" id="">
        @error('cantidadFojas')
        <small>*{{$message}}</small>
        <br><br>
        @enderror --}}

        <button  class="btn btn-danger btn-sm" type="submit">Crear proceso</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
