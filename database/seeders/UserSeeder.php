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
        $user = User::create([
            'name' => 'Test User',
            'location' => 'Cabulijan, Tubigon, Bohol',
            'description' => 'testing',
            'email' => 'testuser@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('test12345'),

        ]);
    }
}
