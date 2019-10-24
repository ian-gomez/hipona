<?php

use Illuminate\Database\Seeder;

class AsistenciasTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Asistencia::class, 100)->create();
    }
}
