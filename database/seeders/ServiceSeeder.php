<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\User;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $customer1 = User::where('email', 'budi@bengkel.com')->first();
        $customer2 = User::where('email', 'siti@bengkel.com')->first();

        Service::create([
            'user_id' => $customer1->id,
            'motor_model' => 'Honda Beat 2020',
            'problem_description' => 'Mesin susah distarter',
            'status' => 'pending',
            'price' => null,
        ]);

        Service::create([
            'user_id' => $customer2->id,
            'motor_model' => 'Yamaha NMAX 2019',
            'problem_description' => 'Rem depan blong',
            'status' => 'in_progress',
            'price' => 250000,
        ]);
    }
}

