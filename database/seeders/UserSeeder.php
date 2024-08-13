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
        User::create([
            'name'     => 'Rahim Taluker',
            'email'    => 'rahim@gmail.com',
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
        User::create([
            'name' => 'Sharif Khan',
            'email' => 'sharif@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'property_owner',
        ]);
        User::create([
            'name' => 'Kayes Khan',
            'email' => 'kayes@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'bidder',
        ]);
        User::create([
            'name' => 'Akash Khan',
            'email' => 'akash@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'bidder',
        ]);
        User::create([
            'name' => 'Maruf Khan',
            'email' => 'maruf@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'bidder',
        ]);
    }
}
