<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $procesos = Proceso::where('userId', $user->id)->orWhere('userContrarioId', $user->id)->orWhere('userJuezId', $user->id)->get();
        return view('procesos.index', compact('procesos'));
        return $procesos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('procesos.create');
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
            'caratula' => 'required',
            'jurisdiccion' => 'required',
            'tipo' => 'required',
            'objeto' => 'required',
            // 'cantidadFojas' => 'required',
            'numeroCausa' => 'required',
            'tribunal' => 'required',
            'ciJuez' => 'required',
        ]);
        if (!DB::table('users')->where('ci', $request->ciJuez)->exists()) {
            return Redirect::back()->with('msg', 'No existe un usuario con ese número de ci');
        }
        $userJuez = DB::table('users')->where('ci', $request->ciJuez)->first();
        // $aaa = $userJuez->id;
        // return $aaa;
        // return $userJuez;
        $user = Auth::user();
        
        $proceso = new Proceso();
        $proceso->nombre = $request->nombre;
        $proceso->caratula = $request->caratula;
        $proceso->jurisdiccion = $request->jurisdiccion;
        $proceso->tipo = $request->tipo;
        $proceso->objeto = $request->objeto;
        $proceso->cantidadFojas = $request->cantidadFojas;
        $proceso->year = '2021';
        $proceso->userId = $user->id;
        $proceso->numeroCausa = $request->numeroCausa;
        $proceso->tribunal = $request->tribunal;
        $proceso->userJuezId = $userJuez->id;
        $proceso->estado = 'en curso';
        $proceso->save();
        return redirect()->route('procesos.index');
        return $proceso;
        return $request;
        /*
        $table->string('nombre');
            $table->string('caratula');
            $table->string('jurisdiccion');
            $table->string('tipo');
            $table->string('objeto');
            $table->integer('cantidadFojas');
            $table->string('año')->nullable();
            $table->timestamps();
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proceso = Proceso::find($id);
        $partes = DB::table('partes')->where('procesoId', $proceso->id)->get();
        $registros = DB::table('procurador_procesos')->where('procesoId', $proceso->id)->get();
        $procuradores = new Collection();

        $lista = DB::table('users')->join('procurador_procesos', 'users.id', '=', 'procurador_procesos.userId')->get();
        // return $lista;

        //actuaciones del proceso
        $actuaciones = DB::table('actuaciones')->where('procesoId', $id)->orderBy('created_at', 'desc')->get();
        // return $actuaciones;
        if(DB::table('users')->where('id', $proceso->userJuezId)->exists())
            $juez = DB::table('users')->where('id', $proceso->userJuezId)->value('nombre');
        else{
            $juez = '';
        }

        foreach ($lista as $e) {
            if($e->procesoId == $id){
                $procuradores->add($e);
            }
        }
        // return $procuradores;
        // return $procuradores;
        $user = Auth::user();
        return view('procesos.show', compact('proceso', 'partes', 'procuradores', 'actuaciones', 'user', 'juez'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proceso = Proceso::find($id);
        return view('procesos.edit', compact('proceso'));
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
            'caratula' => 'required',
            'jurisdiccion' => 'required',
            'tipo' => 'required',
            'objeto' => 'required',
            // 'cantidadFojas' => 'required',
            'numeroCausa' => 'required',
            'tribunal' => 'required',
        ]);
        $user = Auth::user();

        $proceso = Proceso::find($id);
        $proceso->nombre = $request->nombre;
        $proceso->caratula = $request->caratula;
        $proceso->jurisdiccion = $request->jurisdiccion;
        $proceso->tipo = $request->tipo;
        $proceso->objeto = $request->objeto;
        $proceso->userId = $user->id;
        $proceso->save();
        return redirect()->route('procesos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proceso::destroy($id);
        return redirect()->route('procesos.index');
    }
}
