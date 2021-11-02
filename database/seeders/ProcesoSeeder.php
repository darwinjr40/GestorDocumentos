<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proceso;

class ProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proceso = new Proceso();
        $proceso->nombre = 'Proceso hipotecario';
        $proceso->caratula = 'Caratula1';
        $proceso->jurisdiccion = 'Especializada';
        $proceso->tipo = 'Ejecutivo';
        $proceso->objeto = 'Ejecucion hipotecaria';
        $proceso->cantidadFojas = 20;
        $proceso->year = 2021;
        $proceso->userId = 1;
        $proceso->userJuezId = 8;
        $proceso->save();

        $proceso = new Proceso();
        $proceso->nombre = 'Proceso 2';
        $proceso->caratula = 'Caratula2';
        $proceso->jurisdiccion = 'Penal';
        $proceso->tipo = 'Especial';
        $proceso->objeto = 'Ejecucion prendaria';
        $proceso->cantidadFojas = 20;
        $proceso->year = 2021;
        $proceso->userId = 1;
        $proceso->userJuezId = 9;

        $proceso->save();
        

        $proceso = new Proceso();
        $proceso->nombre = 'Proceso administrativo';
        $proceso->caratula = 'caratula3';
        $proceso->jurisdiccion = 'Penal';
        $proceso->tipo = 'Ordinario';
        $proceso->objeto = 'Ejecucion de resoluciones administrativas';
        $proceso->cantidadFojas = 20;
        $proceso->year = 2021;
        $proceso->userId = 2;
        $proceso->userJuezId = 10;

        $proceso->save();

        $proceso = new Proceso();
        $proceso->nombre = 'Proceso judicial';
        $proceso->caratula = 'caratula4';
        $proceso->jurisdiccion = 'Penal';
        $proceso->tipo = 'Sumario';
        $proceso->objeto = 'Ejecucion de resoluciones judiciales';
        $proceso->cantidadFojas = 20;
        $proceso->year = 2021;
        $proceso->userId = 2;
        $proceso->userJuezId = 10;

        $proceso->save();

        $proceso = new Proceso();
        $proceso->nombre = 'Proceso de cobro';
        $proceso->caratula = 'caratula5';
        $proceso->jurisdiccion = 'Penal';
        $proceso->tipo = 'Ejecutivo';
        $proceso->objeto = 'Cobro de alquileres';
        $proceso->cantidadFojas = 20;
        $proceso->year = 2021;
        $proceso->userId = 3;
        $proceso->userContrarioId = 1;
        $proceso->userJuezId = 10;

        $proceso->save();
    }
}
