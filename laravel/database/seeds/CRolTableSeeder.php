<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\CRol;
use App\User;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CRolTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
         DB::table('c_rols')->insert(['nombre' => Administrador]);
         DB::table('c_rols')->insert(['nombre' => Encargado]);
         DB::table('c_rols')->insert(['nombre' => Usuario]);
    }
}
