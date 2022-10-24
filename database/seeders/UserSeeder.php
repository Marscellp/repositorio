<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        User::create([
            'name' => 'Marcelo Poma',
            'email' => 'mars@gmail.com',
            'ci'=>'2345',
            'password' => bcrypt('111'),
            'type' => 'ADMIN',
            'phone' => '1234567',
            'status' => 'ENABLED'
        ]);
        User::create([
            'name' => 'Lenny Laura',
            'email' => 'lenny@gmail.com',
            'ci'=>'1234',
            'password' => bcrypt('222'),
            'type' => 'DOCENTE',
            'phone' => '1234567',
            'status' => 'ENABLED'
        ]);
    }
}
