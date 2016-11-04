<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameu');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->bigInteger('celular');
            $table->string('titulos');
            $table->string('estado')->default('sinestado');
            $table->string('password');
            $table->rememberToken();
            $table->string('tiporol')->default('usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
