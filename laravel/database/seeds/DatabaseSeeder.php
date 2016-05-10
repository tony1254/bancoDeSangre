<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\CRol;
use App\UAfeccion;
use App\User;
use App\CSexo;
use App\CAlmacen;
use App\CEstadoUnidad;
use App\CCongelador;
use App\CFactorSangre;
use App\CGrupoSangre;
use App\CTipoAfeccion;
use App\CTipoTransaccion;
use App\TTransaccion;
use App\TDetalleTransaccion;


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
         DB::table('persona')->insert(['email' => 'Luis@luis.com','cui' => '2145800082214','nombre' => 'Luis Antonio','apellido' => 'Garcia Aguirre','sexo' => '1','fechaNacimiento' => '1992-09-23','telefono1' => '54820872','Vecindad' => ' San Benito Petén','factorSangre' => '1','grupoSangre' => '4']);
         DB::table('persona')->insert(['email' => 'juan@juan.com','cui' => '1234562141701','nombre' => 'Juan Antonio','apellido' => 'Ramirez','sexo' => '1','fechaNacimiento' => '1992-09-23','telefono1' => '54820872','Vecindad' => ' San Miguel, Petén','factorSangre' => '2','grupoSangre' => '3','estado'=>'0']);
        /*seed de almacenes*/
         DB::table('c_almacen')->insert(['nombre' => 'Celulas Rojas']);
         DB::table('c_almacen')->insert(['nombre' => 'Plaquetas']);
         DB::table('c_almacen')->insert(['nombre' => 'Plasma']);
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
         DB::table('c_tipoAfeccion')->insert(['nombre' => 'SIDA']);
         /*seed de  Afecciones*/
         DB::table('u_afeccion')->insert(['cui' => '1234562141701','idTipoAfeccion'=>'1']);
         DB::table('u_afeccion')->insert(['cui' => '1234562141701','idTipoAfeccion'=>'3']);
          /*seed de  Tipo Transaccion*/
         DB::table('c_tipoTransaccion')->insert(['nombre' => 'Donacion']);
         DB::table('c_tipoTransaccion')->insert(['nombre' => 'Retiro']);
         // /*seed de  detalleTransaccion*/
         // DB::table('t_detalleTransaccion')->insert(['idTransaccion' => '1','idUnidad' => '1']);
         // DB::table('t_detalleTransaccion')->insert(['idTransaccion' => '1','idUnidad' => '2']);
         // /*seed de  Transaccion*/
         // DB::table('t_Transaccion')->insert(['idCliente' => '1','idUsuario' => '1','idTipoTransaccion' => '1','idAlmacen' => '1','idCongelador' => '1']);
         

    }
}
        