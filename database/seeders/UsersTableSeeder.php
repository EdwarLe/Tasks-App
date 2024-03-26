<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12312312'),
            'role' => 0
        ]);

        // Employee1
        User::create([
            'name' => 'Employee1',
            'email' => 'employee1@example.com',
            'password' => bcrypt('12312312'),
            'role' => 1
        ]);

        // Employee2
        User::create([
            'name' => 'Employee2',
            'email' => 'employee2@example.com',
            'password' => bcrypt('12312312'),
            'role' => 1
        ]);

        // Employee3
        User::create([
            'name' => 'Employee3',
            'email' => 'employee3@example.com',
            'password' => bcrypt('12312312'),
            'role' => 1
        ]);
    }
}
