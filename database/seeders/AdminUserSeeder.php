<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Resto Admin',
            'email' => 'admin@jossgandos.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        // Create Test Customer
        User::create([
            'name' => 'Test Customer',
            'email' => 'customer@example.com',
            'role' => 'user',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Create additional demo users
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Customer $i",
                'email' => "customer$i@example.com",
                'role' => 'user',
                'password' => Hash::make('password'),
            ]);
        }
    }
}