<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Procurador;

class ProcuradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $procurador = new Procurador();
        $procurador->nombre = '';
        $procurador->ci = '5174862';
        $procurador->telefono = '5174862';

        $procurador->password = bcrypt('aaaa');
        $procurador->tipo = 'abogado';
        $procurador->save();
    }
}
