<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProcesoControllerApi extends Controller
{
    //devolver los procesos en los que el user está como procurador
    public function getProcesos($userId){
        $procesos = new Collection();
        $lista = DB::table('procurador_procesos')->where('userId', $userId)->get();
        // return $lista;
        foreach ($lista as $e) {
            $proceso = DB::table('procesos')->where('id', $e->procesoId)->first();
            $procesos->add($proceso);
        }
        return $procesos;
    }

    public function getProcesosJueces($userId){
        $procesos = DB::table('procesos')->where('userJuezId', $userId)->get();
        return $procesos;
    }
}
