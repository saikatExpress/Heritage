<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Property Owner
        User::create([
            'name' => 'John Doe',
            'email' => 'owner@example.com',
            'password' => Hash::make('password'),
            'role' => 'property_owner',
        ]);

        // Bidder
        User::create([
            'name' => 'Jane Smith',
            'email' => 'bidder@example.com',
            'password' => Hash::make('password'),
            'role' => 'bidder',
        ]);
    }
}
