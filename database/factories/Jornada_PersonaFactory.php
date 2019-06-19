<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Jornada_Persona;
use Faker\Generator as Faker;

$factory->define(Jornada_Persona::class, function (Faker $faker) {
    return [
        'jornada_id' => App\Jornada::all()->random()->id,
        'persona_id' => $faker->unique()->randomElement(App\Persona::pluck('id', 'id')->toArray()),
    ];
});
