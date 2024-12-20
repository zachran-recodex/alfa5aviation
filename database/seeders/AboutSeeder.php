<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'Alfa5 Aviation',
            'image' => 'lol.png',
            'description' => 'Alfa 5 Aviation is a pioneer in the aviation industry, founded with a vision to provide an unmatched flying experience for all our customers. Since our inception in 2022, we have made safety, comfort, and exceptional customer service the core principles of our business. As a company committed to quality, we always strive to provide flight services that meet and exceed the expectations of our passengers, making every journey with us a special and memorable moment.',
            'vision' => 'To ensure all passengers fly in comfort, with the peace of mind that safety is our utmost priority.',
            'mission' => 'We elevate our clients’ experience to the highest level. With our global connections, we offer the most comprehensive, personalized flight and accommodation experiences in the private flight industry.',
        ]);
    }
}
