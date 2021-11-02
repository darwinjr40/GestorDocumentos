<?php

use App\Http\Controllers\Api\ActuacionControllerApi;
use App\Http\Controllers\Api\ProcesoControllerApi;
use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [LoginController::class, 'register']);
Route::post('registerProcurador', [LoginController::class, 'registerProcurador']);



/* Route::post('login', function(){
    return 'api';
}); */



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//ACTUACIONES
Route::post('subirFile', [ActuacionControllerApi::class, 'upload']);


//PROCESOS
Route::get('procesos/{userId}', [ProcesoControllerApi::class, 'getProcesos']);

