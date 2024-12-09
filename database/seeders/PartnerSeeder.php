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
                'image' => 'partners/service1.jpg',
                'url' => 'https://berlianflightsupport.com',
                'status' => true,
            ],
            [
                'image' => 'partners/service1.jpg',
                'url' => 'https://b5inflightcatering.com',
                'status' => true,
            ],
            [
                'image' => 'partners/service1.jpg',
                'url' => 'https://alfa5satu.id',
                'status' => true,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
