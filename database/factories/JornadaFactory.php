<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Jornada;
use Faker\Generator as Faker;

$factory->define(Jornada::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'ubicacion' => $faker->city,
        'fecha_inicio' => $faker->dateTimeBetween($startDate = 'yesterday', $endDate = 'yesterday'),
        'fecha_fin' => $faker->dateTimeBetween($startDate = 'today', $endDate = 'today'),
        'estado' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});
