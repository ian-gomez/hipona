<?php

use Illuminate\Database\Seeder;

class Jornada_PersonaTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Jornada_Persona::class, 50)->create();
    }
}
