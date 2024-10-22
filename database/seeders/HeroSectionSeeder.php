<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hero_sections = [
            [
                'title' => 'Private Jet Charter',
                'image' => 'hero_sections/service1.jpg',
                'status' => 'active',
            ],
        ];

        foreach ($hero_sections as $hero_section) {
            HeroSection::create($hero_section);
        }
    }
}
