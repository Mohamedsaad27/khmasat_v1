<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Mohamed Adel',
                'email' => 'dev.mohamedadell@gmail.com',
                'password' => 'admin@123',
                'role' => 'admin'
            ],
            [
                'name' => 'Mohamed Tharwat',
                'email' => 'mohamedtharwat@gmail.com',
                'password' => 'admin@123',
                'role' => 'admin'
            ],
            [
                'name' => 'Mohamed Saad',
                'email' => 'dev.mohamedsaad@gmail.com',
                'password' => 'admin@123',
                'role' => 'admin'
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'role' => $user['role'],
            ]);
        }
    }
}
