<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Private Jet Charter',
                'slug' => Str::slug('Private Jet Charter'),
                'description' => 'We specialize in the acquisition of aircraft and helicopters tailored to your specific needs. Whether you are looking to purchase new or pre-owned aircraft, our team will guide you through the entire process, from initial consultation to final delivery.',
                'image' => 'service1.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'Private Jet Management Service',
                'slug' => Str::slug('Private Jet Management Service'),
                'description' => 'SagalaPro provides a range of helicopters for various needs, from commercial and recreational to travel and fire-fighting operations. Our helicopters are ideal for reaching remote or congested areas quickly and safely.',
                'image' => 'service2.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'Aviation Consulting',
                'slug' => Str::slug('Aviation Consulting'),
                'description' => 'Transporting heavy and outsized cargo requires expertise and precision. SagalaPro leverages in-depth knowledge of cargo aircraft capabilities to arrange the transportation of large and bulky items efficiently and safely. Need immediate delivery? Contact us, and we will handle the rest.',
                'image' => 'service3.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'Medical Air Ambulance / Medevac',
                'slug' => Str::slug('Medical Air Ambulance / Medevac'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'service4.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'GSA Representative',
                'slug' => Str::slug('GSA Representative'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'service4.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'Operations',
                'slug' => Str::slug('Operations'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'service4.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'Engineering',
                'slug' => Str::slug('Engineering'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'service4.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'Comfort',
                'slug' => Str::slug('Comfort'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'service4.jpg',
                'is_active' => true,
            ],
            [
                'title' => 'Aircraft Brokerage',
                'slug' => Str::slug('Aircraft Brokerage'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'service4.jpg',
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
