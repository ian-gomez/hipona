<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriasTableSeeder::class);
         $this->call(PersonasTableSeeder::class);
         $this->call(JornadasTableSeeder::class);
         $this->call(Jornada_PersonaTableSeeder::class);
         $this->call(AsistenciasTableSeeder::class);
         $this->call(ConfiguracionTableSeeder::class);
    }
}
