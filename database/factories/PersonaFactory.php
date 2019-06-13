<?php

use App\Faker\Provider\es_AR;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
*/

$factory->define(App\Persona::class, function (Faker\Generator $faker) {
	
    return [
        'dni' => $faker->unique()->numberBetween(0,900000000),
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        //'password' => $password ?: $password = bcrypt('secret'),
        'edad' => $faker->date('d/m/Y'),
        'telefono' => $faker->phoneNumber(),
        'ciudad_procedencia' => $faker->state(),
        'area_conocimiento' => $faker->text(15),
        'nivel_ejerce' => $faker->randomElement(array ('Inicial','Primario','Secundario','Terciario','Universitario')),
        'estudiante_actual' => $faker->randomElement(array ('Si', 'No')),
        'categoria_id' => App\Categoria::all()->random()->id,
    ];
}); 