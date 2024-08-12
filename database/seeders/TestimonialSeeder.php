<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'property_id' => 1, // Assuming property ID is 1
            'user_id' => 3,     // Assuming user ID is 3
            'rating' => 5,
            'review' => 'Amazing property! The views are incredible and the place is very luxurious.',
        ]);

        Testimonial::create([
            'property_id' => 2, // Assuming property ID is 2
            'user_id' => 3,     // Assuming user ID is 3
            'rating' => 4,
            'review' => 'Great location, modern amenities. Perfect for city living.',
        ]);
    }
}
