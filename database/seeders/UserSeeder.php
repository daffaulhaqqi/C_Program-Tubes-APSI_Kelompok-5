<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'role_id' => 1, 'name' => 'Admin', 'email' => 'admin@example.com', 'password' => '12345678'],
            ['id' => 2, 'role_id' => 2, 'name' => 'User', 'email' => 'user@example.com', 'password' => '12345678'],
            ['id' => 3, 'role_id' => 2, 'name' => 'User Example 2', 'email' => 'user2@example.com', 'password' => '12345678'],
            ['id' => 4, 'role_id' => 2, 'name' => 'User Example 3', 'email' => 'user3@example.com', 'password' => '12345678'],
            ['id' => 5, 'role_id' => 2, 'name' => 'User Example 4', 'email' => 'user4@example.com', 'password' => '12345678'],
            ['id' => 6, 'role_id' => 2, 'name' => 'User Example 5', 'email' => 'user5@example.com', 'password' => '12345678'],
            ['id' => 7, 'role_id' => 2, 'name' => 'User Example 6', 'email' => 'user6@example.com', 'password' => '12345678'],
        ];

        foreach ($data as $value) {
            User::create($value);
        }
    }
}