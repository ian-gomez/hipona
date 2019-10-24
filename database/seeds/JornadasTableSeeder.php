<?php

use Illuminate\Database\Seeder;

class JornadasTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Jornada::class, 3)->create();
    }
}
