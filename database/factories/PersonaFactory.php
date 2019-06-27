<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Persona;
use Faker\Generator as Faker;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'dni' => $faker->unique()->numberBetween(0,50000000),
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'edad' => $faker->date('d/m/Y'),
        'telefono' => $faker->phoneNumber(),
        'ciudad_procedencia' => $faker->state(),
        'area_conocimiento' => $faker->text(15),
        'nivel_ejerce' => $faker->randomElement(array ('Inicial','Primario','Secundario','Terciario','Universitario')),
        'estudiante_actual' => $faker->boolean($chanceOfGettingTrue = 50),
        'categoria_id' => App\Categoria::all()->random()->id,
    ];
});
