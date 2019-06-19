<?php

use Illuminate\Database\Seeder;

class Jornada_PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Jornada_Persona::class, 20)->create();
    }
}
