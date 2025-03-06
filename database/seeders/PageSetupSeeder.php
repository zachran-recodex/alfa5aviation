<?php

namespace Database\Seeders;

use App\Models\PageSetup;
use Illuminate\Database\Seeder;

class PageSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PageSetup::create([
            'page' => 'home',
            'title' => 'Home - Your Website Title',
            'meta_description' => 'Welcome to our website, your solution for ...',
            'meta_keywords' => 'home, website, solutions',
        ]);

        PageSetup::create([
            'page' => 'about',
            'title' => 'About Us - Your Company',
            'meta_description' => 'Learn more about our company and our story.',
            'meta_keywords' => 'about, company, team, mission',
        ]);

        PageSetup::create([
            'page' => 'service',
            'title' => 'Our Services - What We Offer',
            'meta_description' => 'Explore the wide range of services we offer.',
            'meta_keywords' => 'service, offer, solutions, professional',
        ]);

        PageSetup::create([
            'page' => 'fleet',
            'title' => 'Our Fleet - Explore Our Vehicles',
            'meta_description' => 'Discover the fleet of vehicles we have for your needs.',
            'meta_keywords' => 'fleet, vehicles, transportation',
        ]);

        PageSetup::create([
            'page' => 'contact',
            'title' => 'Contact Us - Get in Touch',
            'meta_description' => 'Have any questions? Get in touch with us.',
            'meta_keywords' => 'contact, support, customer service',
        ]);
    }
}
