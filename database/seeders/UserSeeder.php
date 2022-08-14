<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 10 users
        User::factory()->count(10)->create();
        //crete my user
        User::factory()->create([
            'name' => 'Anderson Belderrama',
            'email' => 'andersonbelderrama@gmail.com',
            'password' => bcrypt('Senha@123'),
        ]);

    }
}
