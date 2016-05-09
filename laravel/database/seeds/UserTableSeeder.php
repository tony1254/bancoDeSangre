<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\CRol;
use App\User;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
          DB::table('users')->insert([
            'name' => Admin,
            'email' => 'lgarcia-1254@outlook.com',
            'rol' => 1,
            'password' => bcrypt('123456')
        ]);
    }
}
