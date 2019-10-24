<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJornadaPersonaTable extends Migration
{
    public function up()
    {
        Schema::create('jornada_persona', function (Blueprint $table) {
            $table->bigInteger('jornada_id')->unsigned();
            $table->bigInteger('persona_id')->unsigned();

            $table->foreign('jornada_id')->references('id')->on('jornadas');
            $table->foreign('persona_id')->references('id')->on('personas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jornada_persona');
    }
}
