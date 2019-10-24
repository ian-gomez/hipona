<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    public function run()
    {
        App\Categoria::create([
            'descripcion' => 'Asistente',
            ]);
        App\Categoria::create([
        	'descripcion' => 'Expositor',
            ]);
    }
}
