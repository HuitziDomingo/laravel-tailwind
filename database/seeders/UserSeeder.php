<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Huitzitzili Domingo Leon Nieves',
            'email' => 'huitzi_kiuby@gmail.net',
            'password' => bcrypt('1234567890')
        ]);

        User::factory(9)->create();
    }
}
