<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'johndoe',
                'email' => 'johndoe@mail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'janedo',
                'email' => 'janedo@mail.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
