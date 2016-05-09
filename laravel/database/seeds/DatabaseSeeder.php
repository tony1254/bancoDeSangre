<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\CRol;
use App\User;
use App\CSexo;
use App\CAlmacen;
use App\CEstadoUnidad;
use App\CCongelador;
use App\CFactorSangre;
use App\CGrupoSangre;
use App\CTipoAfeccion;
use App\CTipoTransaccion;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	   //  Model::unguard();

        // $this->call(UserTableSeeder::class);
        // $this->call(CRolTableSeeder::class);
        //     Model::reguard();

  // TestDummy::times(20)->create('App\Post');
          DB::table('users')->insert([
            'name' => 'Luis',
            'email' => 'lgarcia-1254@outlook.com',
            'cui' => 2145800082214,
            'rol' => 1,
            'password' => bcrypt('123456')
        ]);
        /*seed de roles*/
         DB::table('c_rols')->insert(['nombre' => 'Administrador']);
         DB::table('c_rols')->insert(['nombre' => 'Encargado']);
         DB::table('c_rols')->insert(['nombre' => 'Usuario']);
        /*seed de sexos*/
         DB::table('c_sexo')->insert(['nombre' => 'Hombre']);
         DB::table('c_sexo')->insert(['nombre' => 'Mujer']);

        /*seed de Persona*/
         DB::table('persona')->insert(['cui' => '2145800082214','nombre' => 'Luis Antonio','apellido' => 'Garcia Aguirre','sexo' => '1','fechaNacimiento' => '1992-09-23','telefono1' => '54820872','Vecindad' => ' San Benito Petén','factorSangre' => '1','grupoSangre' => '4']);
        /*seed de almacenes*/
         DB::table('c_almacen')->insert(['nombre' => 'almacen1']);
         DB::table('c_almacen')->insert(['nombre' => 'almacen2']);
        /*seed de congelador*/
         DB::table('c_congelador')->insert(['nombre' => 'congelador1']);
         DB::table('c_congelador')->insert(['nombre' => 'congelador2']);
        /*seed de Estado de Unidades*/
         DB::table('c_estadoSangre')->insert(['nombre' => 'Activa']);
         DB::table('c_estadoSangre')->insert(['nombre' => 'Inactiva']);
         DB::table('c_estadoSangre')->insert(['nombre' => 'Caducada']);
         /*seed de Grupo de Unidades*/
         DB::table('c_grupoSangre')->insert(['nombre' => 'A']);
         DB::table('c_grupoSangre')->insert(['nombre' => 'B']);
         DB::table('c_grupoSangre')->insert(['nombre' => 'AB']);
         DB::table('c_grupoSangre')->insert(['nombre' => 'O']);
         /*seed de Factor de Unidades*/
         DB::table('c_factorSangre')->insert(['nombre' => '+']);
         DB::table('c_factorSangre')->insert(['nombre' => '-']);
         /*seed de Tipo Afecciones*/
         DB::table('c_tipoAfeccion')->insert(['nombre' => 'Hepatitis']);
         DB::table('c_tipoAfeccion')->insert(['nombre' => 'Tatuaje']);
         DB::table('c_tipoAfeccion')->insert(['nombre' => 'Tatuaje']);

    }
}
        