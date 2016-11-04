<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineasTable extends Migration
{
    public function up()
    {
        Schema::create('lineas', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('linea');
            $table->timestamps();

        });
    }

     public function down()
    {
        Schema::drop('lineas');
    }
}
