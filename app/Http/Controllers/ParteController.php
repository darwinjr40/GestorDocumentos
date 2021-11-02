<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parte;
use App\Models\Proceso;
use Illuminate\Support\Facades\Redirect;

class ParteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $proceso = Proceso::find($id);
        return view('partes.create', compact('proceso'));
    }

    public function create2($id)
    {
        $proceso = Proceso::find($id);
        return view('partes.create', compact('proceso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ci' => 'required',
            'tipo' => 'required',
            'fechaNac' => 'required',
            'sexo' => 'required',
            'domicilio' => 'required',
            'email' => 'email',
            'telefono' => 'required',
            'procesoId' => 'required',
        ]);

        $parte = New Parte();
        $parte->nombre = $request->nombre;
        $parte->ci = $request->ci;
        $parte->tipo = $request->tipo;
        $parte->fecha_nac = $request->fechaNac;
        $parte->sexo = $request->sexo;
        $parte->domicilio = $request->domicilio;
        $parte->telefono = $request->telefono;
        $parte->email = $request->email;
        $parte->procesoId = $request->procesoId;
        $parte->save();
        return redirect()->route('procesos.show', $request->procesoId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parte = Parte::findOrFail($id);
        return view('partes.show', compact('parte'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parte = Parte::findOrFail($id);
        return view('partes.edit', compact('parte'));
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
        $request->validate([
            'nombre' => 'required',
            'ci' => 'required',
            'tipo' => 'required',
            'fechaNac' => 'required',
            'sexo' => 'required',
            'domicilio' => 'required',
            'email' => 'email',
            'telefono' => 'required',
            'procesoId' => 'required',
        ]);

        $parte = Parte::findOrFail($id);
        $parte->nombre = $request->nombre;
        $parte->ci = $request->ci;
        $parte->tipo = $request->tipo;
        $parte->fecha_nac = $request->fechaNac;
        $parte->sexo = $request->sexo;
        $parte->domicilio = $request->domicilio;
        $parte->telefono = $request->telefono;
        $parte->email = $request->email;
        // $parte->procesoId = $request->procesoId;
        $parte->save();
        return redirect()->route('procesos.show', $parte->procesoId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parte = Parte::findOrFail($id);
        Parte::destroy($parte->id);
        return Redirect::back()->with('msg', 'Parte eliminada');
        
    }
}
