<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('nombrep');
            $table->string('sectorenfocado');
            $table->string('empresa');

            $table->integer('linea_id')->unsigned();
            $table->foreign('linea_id')->references('id')
            ->on('lineasproyectos')->onDelete('cascade');

            $table->string('descripcion');
            $table->string('estado');
            $table->timestamps();

            //$table->integer('linea_id')->unsigned();
            //$table->foreign('linea_id')->references('id')
            //->on('lineas')->onDelete('cascade');

            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')
            ->on('users')->onDelete('cascade');
        });
 }
      

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proyectos');
    }
}
