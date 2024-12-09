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
        $heroSections = [
            [
                'title' => 'Private Jet Charter',
                'image' => 'hero-sections/service1.jpg',
                'status' => true,
            ],
            [
                'title' => 'Private Jet Yow',
                'image' => 'hero-sections/service1.jpg',
                'status' => true,
            ],
            [
                'title' => 'Private Jet Anjay',
                'image' => 'hero-sections/service1.jpg',
                'status' => true,
            ],
        ];

        foreach ($heroSections as $heroSection) {
            HeroSection::create($heroSection);
        }
    }
}
