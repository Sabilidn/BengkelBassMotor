<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Bengkel',
            'email' => 'admin@bengkel.com',
            'phone' => '081234567890',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Mechanic
        User::create([
            'name' => 'Mekanik 1',
            'email' => 'mekanik1@bengkel.com',
            'phone' => '081298765432',
            'role' => 'mechanic',
            'password' => Hash::make('mekanik123'),
        ]);

        // Customer
        User::create([
            'name' => 'Budi Customer',
            'email' => 'budi@bengkel.com',
            'phone' => '081212345678',
            'role' => 'customer',
            'password' => Hash::make('customer123'),
        ]);

        User::create([
            'name' => 'Siti Customer',
            'email' => 'siti@bengkel.com',
            'phone' => '081223344556',
            'role' => 'customer',
            'password' => Hash::make('customer123'),
        ]);
    }
}
