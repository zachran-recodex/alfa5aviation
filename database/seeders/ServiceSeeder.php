<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

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
                'image' => 'services/service1.jpg',
                'status' => 'active',
            ],
            [
                'title' => 'Private Jet Management Service',
                'slug' => Str::slug('Private Jet Management Service'),
                'description' => 'SagalaPro provides a range of helicopters for various needs, from commercial and recreational to travel and fire-fighting operations. Our helicopters are ideal for reaching remote or congested areas quickly and safely.',
                'image' => 'services/service2.jpg',
                'status' => 'active',
            ],
            [
                'title' => 'Aviation Consulting',
                'slug' => Str::slug('Aviation Consulting'),
                'description' => 'Transporting heavy and outsized cargo requires expertise and precision. SagalaPro leverages in-depth knowledge of cargo aircraft capabilities to arrange the transportation of large and bulky items efficiently and safely. Need immediate delivery? Contact us, and we will handle the rest.',
                'image' => 'services/service3.jpg',
                'status' => 'active',
            ],
            [
                'title' => 'Medical Air Ambulance / Medevac',
                'slug' => Str::slug('Medical Air Ambulance / Medevac'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'services/service4.jpg',
                'status' => 'active',
            ],
            [
                'title' => 'GSA Representative',
                'slug' => Str::slug('GSA Representative'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'services/service4.jpg',
                'status' => 'active',
            ],
            [
                'title' => 'Operations',
                'slug' => Str::slug('Operations'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'services/service4.jpg',
                'status' => 'active',
            ],
            [
                'title' => 'Engineering',
                'slug' => Str::slug('Engineering'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'services/service4.jpg',
                'status' => 'active',
            ],
            [
                'title' => 'Comfort',
                'slug' => Str::slug('Comfort'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'services/service4.jpg',
                'status' => 'active',
            ],
            [
                'title' => 'Aircraft Brokerage',
                'slug' => Str::slug('Aircraft Brokerage'),
                'description' => 'Experience the ultimate in luxury travel with SagalaPro’s private jet charters. Whether for business or leisure, our charters provide a flexible, on-demand solution that puts your comfort and convenience first.',
                'image' => 'services/service4.jpg',
                'status' => 'active',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
