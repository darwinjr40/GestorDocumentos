<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function register(Request $request){
    //    return $request;
       $request->validate([
            'name'=> 'required|unique:users',
            'nombre' => 'required',
            'ci' => 'required|unique:users',
            'email' => 'required',
            'telefono' => 'required',
            'tipo' => 'required',
            'genero' => 'required',
            'password' => 'required|min:4',
       ]);
    //    return $request;
       
       $user = new User();
       $user->name = $request->name;
       $user->nombre = $request->nombre;
       $user->telefono = $request->telefono;
       $user->tipoId = $request->tipo;
       $user->ci = $request->ci;
       $user->email = $request->email;
       $user->fechaNac = $request->fechaNac;
       $user->genero = $request->genero;
       $user->password = bcrypt($request->password);
       $user->tipoId = $request->tipo;
       $user->save();

       return redirect()->route('home'); 
    }

    public function perfil(){
        $user = Auth::user();
        $tipo = DB::table('tipos_user')->where('id', $user->tipoId)->first();

        return view('usuarios.perfil', compact('user', 'tipo'));
    }
}
