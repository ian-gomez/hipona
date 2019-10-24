<?php

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Persona::class, 50)->create();
    }
}
