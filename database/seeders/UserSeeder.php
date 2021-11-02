<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'javier';
        $user->nombre = 'javier andres vidal';
        $user->telefono = '77392386';
        $user->ci = '8179445';
        $user->email = 'javier193061@gmail.com';
        $user->fechaNac = '2000/06/10';
        $user->genero = 'masculino';
        $user->password = bcrypt('aaaa');
        $user->tipoId = 1;
        $user->save();

        $user = new User();
        $user->name = 'daniel';
        $user->nombre = 'Daniel Rivera';
        $user->telefono = '77482368';
        $user->ci = '11111';
        $user->email = 'daniel@gmail.com';
        $user->fechaNac = '2000/02/15';
        $user->genero = 'masculino';
        $user->password = bcrypt('aaaa');
        $user->tipoId = 1;
        $user->save();

        $user = new User();
        $user->name = 'pedro';
        $user->nombre = 'Pedro';
        $user->telefono = '784412366';
        $user->ci = '22222';
        $user->email = 'pedro@gmail.com';
        $user->fechaNac = '1999/12/12';
        $user->genero = 'masculino';
        $user->password = bcrypt('aaaa');
        $user->tipoId = 1;
        $user->save();

        //PROCURADORES
        $user = new User();
        $user->name = 'maria';
        $user->nombre = 'maria';
        $user->telefono = '7412366';
        $user->ci = '9999';
        $user->email = 'maria@gmail.com';
        $user->fechaNac = '1999/12/11';
        $user->genero = 'femenino';
        $user->password = bcrypt('aaaa');
        $user->tipoId = 2;
        $user->save();

        $user = new User();
        $user->name = 'ana';
        $user->nombre = 'ana';
        $user->telefono = '7415366';
        $user->ci = '8888';
        $user->email = 'ana@gmail.com';
        $user->fechaNac = '1999/11/10';
        $user->genero = 'femenino';
        $user->password = bcrypt('aaaa');
        $user->tipoId = 2;
        $user->save();

        $user = new User();
        $user->name = 'carla';
        $user->nombre = 'carla';
        $user->telefono = '78424741';
        $user->ci = '7777';
        $user->email = 'carla@gmail.com';
        $user->fechaNac = '2001/12/20';
        $user->genero = 'femenino';
        $user->password = bcrypt('aaaa');
        $user->tipoId = 2;
        $user->save();

        $user = new User();
        $user->name = 'martha';
        $user->nombre = 'martha';
        $user->telefono = '74412366';
        $user->ci = '6666';
        $user->email = 'martha@gmail.com';
        $user->fechaNac = '1999/09/13';
        $user->genero = 'femenino';
        $user->password = bcrypt('aaaa');
        $user->tipoId = 2;
        $user->save();

        $user = new User();
        $user->name = 'alfredo';
        $user->nombre = 'Alfredo Orellana';
        $user->telefono = '74581388';
        $user->ci = '1111112';
        $user->email = 'alfredo@gmail.com';
        $user->fechaNac = '1980/09/08';
        $user->genero = 'masculino';
        $user->password = bcrypt('aaaa');
        $user->tipoId = 3;
        $user->save();

        $user = new User();
        $user->name = 'felix';
        $user->nombre = 'Felix Suarez';
        $user->telefono = '77418579';
        $user->ci = '1111113';
        $user->email = 'felix@gmail.com';
        $user->fechaNac = '1990/02/25';
        $user->genero = 'masculino';
        $user->password = bcrypt('aaaa');
        $user->tipoId = 3;
        $user->save();

        $user = new User();
        $user->name = 'miguel';
        $user->nombre = 'Miguel Cortez';
        $user->telefono = '74195716';
        $user->ci = '1111114';
        $user->email = 'miguel@gmail.com';
        $user->fechaNac = '1980/12/11';
        $user->genero = 'masculino';
        $user->password = bcrypt('aaaa');
        $user->tipoId = 3;
        $user->save();
    }
}
