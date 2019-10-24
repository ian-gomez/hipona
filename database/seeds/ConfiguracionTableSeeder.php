<?php

use Illuminate\Database\Seeder;

class ConfiguracionTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Configuracion::class, 3)->create();
    }
}
