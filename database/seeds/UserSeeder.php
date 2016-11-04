<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nameu'        => 'Morris',
            'apellidos'    => 'anacleto',
            'email'    	   => 'morris@gmail.com',
            'celular'      => '3215697363',
            'titulos'	   => 'Tecnologo',
            'estado'       => 'sinestado',
            'password'     => bcrypt('123456'),
            'tiporol'      => 'gestor'
        ]);

        DB::table('users')->insert([
            'nameu'        => 'Yonathan Andres',
            'apellidos'    => 'Galvez Giraldo',
            'email'        => 'ogiraldo272@gmail.com',
            'celular'      => '3122730311',
            'titulos'      => 'Tecnologo',
            'estado'       => 'sinestado',
            'password'     => bcrypt('123456'),
            'tiporol'      => 'usuario'
        ]);
    }
}
