<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Procurador;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        /* if($request->name = '' || $request->password == '')
            return response()->json(['message' => 'These credentials do not match our records.'], 404); */

        if(!DB::table('users')->where('name', $request->name)->exists()){
            return response()->json(['message' => 'TTTThese credentials do not match our records.'], 404);
        }

        $user = User::where('name', $request->name)->firstOrFail();
        if(Hash::check($request->password, $user->password)){
            return $user;
        }else{
            return response()->json(['message' => 'These credentials do not match our records.'], 404);
        }
    }

    public function register(Request $request){//ya no lo ocupo
        $request->validate([
            'name' => 'required|string|min:4',
            'password' => 'required|string|min:4'
        ]);

        if(DB::table('users')->where('name', $request->name)->exists()){
            return response()->json(['message' => 'Ya existe un usuario con ese nombre'], 404);
        }

        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->tipo = 'procurador';
        $user->save();

        $procurador = new Procurador();
        
        return $user;
    }

    public function registerProcurador(Request $request){
        // return $request;
        $request->validate([
            'name' => 'required|min:4',
            'nombre' => 'required',
            'telefono' => 'required',
            'ci' => 'required',
            'email' => 'required',
            'genero' => 'required',
            'password' => 'required|min:4'
        ]);
        
        
        if(DB::table('users')->where('name', $request->name)->exists()){
            return response()->json(['message' => 'Ya existe un usuario con ese nombre'], 404);
        }
        if(DB::table('procuradores')->where('ci', $request->ci)->exists()){
            return response()->json(['message' => 'Ya existe un usuario con ese número de carnet'], 404);
        }
        if(DB::table('users')->where('email', $request->email)->exists()){
            return response()->json(['message' => 'Ya existe un usuario con ese email'], 404);
        }
        
        $user = new User();
        $user->name = $request->name;
        $user->nombre = $request->nombre;
        $user->telefono = $request->telefono;
        $user->ci = $request->ci;
        $user->email =$request->email;
        $user->genero = $request->genero;
        $user->fechaNac = $request->fechaNac;
        $user->password = bcrypt($request->password);
        $user->tipoId = 2;
        $user->save();
        
        /* $procurador = new Procurador();
        $procurador->nombre = $request->nombre;
        $procurador->ci = $request->ci;
        $procurador->telefono = $request->telefono;
        $procurador->email = $request->email;
        $procurador->sexo = $request->sexo;
        $procurador->userId = $user->id;
        $procurador->save(); */
        return $user;
        return $request;
    }

    public function getUser(Request $request){
        
    }
}
