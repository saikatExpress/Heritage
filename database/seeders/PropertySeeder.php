<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Property::create([
            'title' => 'Luxury Villa',
            'description' => 'A beautiful luxury villa with sea views.',
            'location' => 'Malibu, CA',
            'price' => 2500000.00,
            'bedrooms' => 5,
            'bathrooms' => 4,
            'size' => 3500, // Square feet
            'owner_id' => 2, // Assuming the owner ID is 2
            'image' => 'luxury_villa.jpg',
        ]);

        Property::create([
            'title' => 'Modern Apartment',
            'description' => 'A modern apartment in the heart of the city.',
            'location' => 'New York, NY',
            'price' => 1200000.00,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'size' => 1200, // Square feet
            'owner_id' => 2, // Assuming the owner ID is 2
            'image' => 'modern_apartment.jpg',
        ]);
    }
}
