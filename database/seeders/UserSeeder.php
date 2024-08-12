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
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // Property Owner
        User::create([
            'name'     => 'Saikat Taluker',
            'email'    => 'saikat@gmail.com',
            'password' => Hash::make('password'),
            'role'     => 'property_owner',
        ]);

        // Bidder
        User::create([
            'name' => 'Saibal Khan',
            'email' => 'saibal@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'bidder',
        ]);
    }
}
