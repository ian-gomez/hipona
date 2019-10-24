<?php

use App\Asistencia;
use Faker\Generator as Faker;

$factory->define(Asistencia::class, function (Faker $faker) {
    $jornada = App\Jornada::all()->random();
    $total = $jornada->personas->count();
    $total = $total-1;
    $indice = random_int(0,$total);
    return [
        'jornada_id' => $jornada->id,
        'persona_id' => $jornada->personas[$indice]->id,
    ];
});
