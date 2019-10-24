<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciasTable extends Migration
{
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->bigInteger('jornada_id')->unsigned();
            $table->bigInteger('persona_id')->unsigned();
            $table->timestamps();

            $table->foreign('jornada_id')->references('id')->on('jornadas');
            $table->foreign('persona_id')->references('id')->on('personas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}
