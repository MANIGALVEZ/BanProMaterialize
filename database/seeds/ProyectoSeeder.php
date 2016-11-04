<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProyectoSeeder extends Seeder
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
    		\DB::table('proyectos')->insert([
    			'nombrep'          => $faker->firstName,
                'sectorenfocado'   => $faker->lastName,
                'empresa'           => $faker->name,
                'descripcion'      => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis eligendi nam magni sapiente, itaque autem eum ratione, praesentium ipsam a quidem temporibus adipisci incidunt numquam sed labore nesciunt, animi cupiditate.',
                'estado'		   => 'Activo',
                'usuario_id'       => $faker->numberBetween($min= 1, $max= 2)

    			]);
    	}
    }
}
