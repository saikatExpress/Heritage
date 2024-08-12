<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'name' => 'Alice Johnson',
            'role' => 'Real Estate Agent',
            'contact_details' => 'alice@example.com',
            'image' => 'alice.jpg',
        ]);

        Team::create([
            'name' => 'Bob Williams',
            'role' => 'Property Manager',
            'contact_details' => 'bob@example.com',
            'image' => 'bob.jpg',
        ]);
    }
}
