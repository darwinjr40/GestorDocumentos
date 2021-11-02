<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procurador;
use App\Models\Proceso;
use App\Models\ProcuradorProceso;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProcuradorController extends Controller
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
    public function create()
    {
        //
    }

    public function create2($id)
    {
        $proceso = Proceso::find($id);
        return view('procuradores.create', compact('proceso'));
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
            'ci' => 'required',
            'procesoId' => 'required',
            'tipo' => 'required'
        ]);

        if (!DB::table('users')->where('ci', $request->ci)->exists()) {
            return Redirect::back()->with('msg', 'No existe un usuario con ese número de ci');
        }
        $user = User::where('ci', $request->ci)->first();
        $userProcurador=ProcuradorProceso::create([
            'userId' => $user->id,
            'procesoId' => $request->procesoId,
            'tipo' => $request->tipo,
        ]);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroy2($procesoId, $userId)
    {
        // return $userId;
        $user = DB::table('procurador_procesos')->where('userId', $userId)->where('procesoId', $procesoId)->first();
        $usera = DB::table('procurador_procesos')->where('userId', $userId)->first();
        
        // return $user;
        // return $user->id;
        ProcuradorProceso::destroy($user->id);
        return redirect()->route('procesos.show', $procesoId);

    }
}
