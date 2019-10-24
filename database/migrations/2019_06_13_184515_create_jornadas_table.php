<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJornadasTable extends Migration
{
    public function up()
    {
        Schema::create('jornadas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('ubicacion');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->boolean('estado')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('jornadas');
    }
}
