<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dni')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('fecha_nacimiento');
            $table->string('telefono');
            $table->string('ciudad_procedencia');
            $table->string('area_conocimiento');
            $table->string('nivel_ejerce');
            $table->boolean('estudiante_actual');
            $table->bigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    public function down()
    {
       Schema::dropIfExists('personas');
    }
}
