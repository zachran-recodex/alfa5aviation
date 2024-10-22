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
                'image' => 'partners/service1.jpg',
                'url' => 'https://berlianflightsupport.com',
                'status' => 'active',
            ],
            [
                'title' => 'Berlima Inflight Catering',
                'image' => 'partners/service1.jpg',
                'url' => 'https://b5inflightcatering.com',
                'status' => 'active',
            ],
            [
                'title' => 'Alfalimasatu',
                'image' => 'partners/service1.jpg',
                'url' => 'https://alfa5satu.id',
                'status' => 'active',
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
