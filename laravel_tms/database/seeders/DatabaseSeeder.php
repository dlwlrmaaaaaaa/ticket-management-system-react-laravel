<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(25)->create();

        $users = [
            [
                'emp_no' => 'EMP001',
                'username' => 'user',
                'email' => 'cmate7584@gmail.com',
                'password' => Hash::make('user'),
                'role' => 'user'
            ],
            [
                'emp_no' => 'EMP002',
                'username' => 'admin',
                'email' => '20210686m.marucut.justin.bscs@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ],
            [
                'emp_no' => 'EMP003',
                'username' => 'tech',
                'email' => 'cedmarucut@gmail.com',
                'password' => Hash::make('technical'),
                'role' => 'technical'
            ]
        ];
        

        foreach ($users as $userData) {
            User::create($userData);
        }

    }
}
