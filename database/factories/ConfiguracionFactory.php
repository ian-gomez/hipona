<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Configuracion;
use Faker\Generator as Faker;

$factory->define(Configuracion::class, function (Faker $faker) {
    return [
        'jornada_id' => App\Jornada::all()->unique()->id,
        'cantidad_asistencias' => $faker->numberBetween(3,10),
        'tolerancia' => $faker->numberBetween(30,60),
    ];
});
