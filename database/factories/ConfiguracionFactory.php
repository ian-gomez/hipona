<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Configuracion;
use Faker\Generator as Faker;

$factory->define(Configuracion::class, function (Faker $faker) {
	static $indice = 0;
	$jornada = App\Jornada::all();
    return [
        'jornada_id' => $jornada[$indice++]->id,
        'cantidad_asistencias' => $faker->numberBetween(5,10),
        'tolerancia' => $faker->numberBetween(30,60),
    ];
});
