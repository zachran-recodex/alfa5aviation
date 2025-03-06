<?php

namespace Database\Seeders;

use App\Models\Fleet;
use Illuminate\Database\Seeder;

class FleetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fleet::create([
            'title' => 'Boeing 737',
            'slug' => 'boeing-737',
            'description' => 'A reliable and efficient aircraft used for short to medium-haul routes.',
            'image' => 'images/fleets/boeing-737.jpg',
            'start_model_year' => 1968,
            'end_model_year' => 2023,
            'fleet_size' => 5000,
            'engine_count' => 2,
            'passenger' => 189,
            'model_class' => 'Commercial',
            'range' => 6555,
            'max_cruising_speed' => 876,
            'ceiling' => 12500,
            'take_off_distance' => 2500,
            'landing_distance' => 1500,
            'is_active' => true,
        ]);
    }
}
