<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
