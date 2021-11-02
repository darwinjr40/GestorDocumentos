<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actuacion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ActuacionControllerApi extends Controller
{
    public function store(Request $request){
        $file = $request->file;
        
        if($request->hasFile('file')){
            $actuacion = new Actuacion();
            $actuacion->nombre = $request->titulo;
            $actuacion->file = $request->file('file')->getClientOriginalName();
            $actuacion->tipo = $request->tipo;
            $actuacion->fecha = $request->fecha;
            $actuacion->procesoId = $request->procesoId;
            $actuacion->tipoArchivo = $request->tipoArchivo;
            $id = (int)$request->procesoId;
            $request->file('file')->storeAs('$id', $actuacion->file);
        
        }else{
            return response()->json(['message' => 'Error al subir el archivo']);
        }
    }

    public function upload(Request $request){
        // return response()->json(['message' => 'entra al método upload']);
        // return $request;
        if($request->hasFile('file')){
            $actuacion = new Actuacion();
            $actuacion->file = $request->file('file')->getClientOriginalName();
            $actuacion->tipo = $request->tipo;
            $actuacion->tipoArchivo = $request->tipoArchivo;
            $id = (int)$request->procesoId;
            $actuacion->procesoId = $id;
            
            $ar = $request->file('file');
            $arName = $ar->getClientOriginalName();
            $arName = pathinfo($arName, PATHINFO_FILENAME);
            $name_ar = str_replace(" ", "_", $arName);

            $extension = $ar->getClientOriginalExtension();

            $picture = date('His').'-'.$name_ar.'.'.$extension;
            $tituloArchivo = $request->titulo.'.'.$extension;
            $tituloArchivo = str_replace(" ", "_", $tituloArchivo);
            // $ar->move(public_path('Files/'), $picture);
            $ar->move(public_path("storage/$request->procesoId"), $tituloArchivo);
            // $ar->move(public_path("$request->procesoId"), $tituloArchivo);

            $actuacion->titulo = $tituloArchivo;
            $actuacion->path = "$request->procesoId/$request->titulo";
            $actuacion->tipoArchivo = $extension;
            $actuacion->save();


            // $request->file('file')->storeAs('books', $picture);
            // $ar->storeAs('books', $picture);
            return response()->json(['mensaje' => 'archivo subido con exito']);


        
        }else{
            return response()->json(['message' => 'Error al subir el aaarchivo']);
        }
    }

    public function getFiles($procesoId){
        $urlInicial = "localhost/GestorDocumento/public/storage/";
        $listaActuaciones = new Collection();
        $actuaciones = DB::table('actuaciones')->where('procesoId', $procesoId)->get();
        foreach ($actuaciones as $actuacion) {
            // $url = Storage::url("2/$actuacion->titulo");
            $titulo = $actuacion->titulo;
            $url = $urlInicial.$procesoId.'/'.$actuacion->titulo;
            $listaActuaciones->add($url);
            // return $url;
        }
        return $listaActuaciones;
    }
}
