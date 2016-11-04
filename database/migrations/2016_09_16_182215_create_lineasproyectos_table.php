<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineasproyectosTable extends Migration
{
    public function up()
    {
        Schema::create('lineasproyectos', function (Blueprint $table) 
        {
            $table->increments('id');

            $table->integer('proyectos_id')->unsigned();
            $table->foreign('proyectos_id')->references('id')
                ->on('proyectos')->onDelete('cascade');

            $table->integer('lineas_id')->unsigned();
            $table->foreign('lineas_id')->references('id')
                ->on('lineas')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lineasproyectos');
    }
}
