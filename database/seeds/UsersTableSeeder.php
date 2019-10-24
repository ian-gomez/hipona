<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::create([
            'name' => "root",
            'email' => "root@mail.com",
            'password' => bcrypt('123456789'),
            'remember_token' => str_random(10),
        	]));
         factory(App\User::class, 5)->create();
    }
}
