<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcesoController;
use App\Http\Controllers\ParteController;
use App\Http\Controllers\ProcuradorController;
use App\Http\Controllers\ActuacionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbogadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});
Route::post('registerUser', [UserController::class, 'register'])->name('users.register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('procesos', ProcesoController::class)->names('procesos');
Route::resource('procuradores', ProcuradorController::class)->names('procuradores');


Route::resource('partes', ParteController::class)->names('partes');
Route::get('partes/create/{procesoId}', [ParteController::class, 'create2'])->name('partes.create2');

//Registro de procuradores
Route::get('procuradores/create/{procesoId}', [ProcuradorController::class, 'create2'])->name('procuradores.create2');
Route::delete('procuradores/destroy2/{procesoId}/{userId}', [ProcuradorController::class, 'destroy2'])->name('procuradores.destroy2');


//ACTUACIONES
Route::get('actuaciones/{procesoId}', [ActuacionController::class, 'getFiles'])->name('actuaciones.getFiles');

//Asignar abogado parte contraria
Route::resource('abogados', AbogadoController::class)->names('abogados');
Route::get('abogados/asignarAbogado/{procesoId}', [AbogadoController::class, 'asignarProcurador'])->name('abogados.asignarProcurador');


