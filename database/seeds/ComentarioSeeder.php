<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();
    	for ($i=1; $i < 30; $i++) { 
    		\DB::table('comentarios')->insert([
    			'comentario'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing.',
                'proyecto_id'   => $faker->numberBetween($min = 1, $max = 30),
                'usuario_id'    => $faker->numberBetween($min = 1, $max = 2)
    			]);
    	}
    }
}
