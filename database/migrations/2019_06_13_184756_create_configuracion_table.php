<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracionTable extends Migration
{
    public function up()
    {
        Schema::create('configuracion', function (Blueprint $table) {
            $table->bigInteger('jornada_id')->unsigned();
            $table->integer('cantidad_asistencias');
            $table->integer('tolerancia');

            $table->foreign('jornada_id')->references('id')->on('jornadas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('configuracion');
    }
}
