<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoUser;

class TipoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new TipoUser();
        $tipo->descripcion = 'abogado';
        $tipo->save();

        $tipo = new TipoUser();
        $tipo->descripcion = 'procurador';
        $tipo->save();

        $tipo = new TipoUser();
        $tipo->descripcion = 'juez';
        $tipo->save();
    }
}
