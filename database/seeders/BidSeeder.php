<?php

namespace Database\Seeders;

use App\Models\Bid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bid::create([
            'property_id' => 1, // Assuming property ID is 1
            'bidder_id' => 3,   // Assuming bidder ID is 3
            'bid_amount' => 2550000.00,
        ]);

        Bid::create([
            'property_id' => 2, // Assuming property ID is 2
            'bidder_id' => 3,   // Assuming bidder ID is 3
            'bid_amount' => 1250000.00,
        ]);
    }
}
