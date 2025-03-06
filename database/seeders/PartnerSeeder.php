<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            [
                'title' => 'Berlian Ground Support',
                'image' => 'service1.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'Berlima Inflight Catering',
                'image' => 'service1.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'Alfalima Satu',
                'image' => 'service1.jpg',
                'is_active' => true,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }

    }
}
