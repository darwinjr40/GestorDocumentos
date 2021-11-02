<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ActuacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function getFiles($procesoId){
        /* $listaActuaciones = new Collection();
        $actuaciones = DB::table('actuaciones')->where('procesoId', $procesoId)->get();
        foreach ($actuaciones as $actuacion) {
            $url = Storage::url("2/$actuacion->titulo");
            $listaActuaciones->add($url);
            // return $url;
        }
        return $listaActuaciones; */
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
