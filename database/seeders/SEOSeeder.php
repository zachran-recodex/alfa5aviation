<?php

namespace Database\Seeders;

use App\Models\SEO;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SEOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SEO::create([
            'page' => 'home',
            'title' => 'Home - Your Website Title',
            'meta_description' => 'Welcome to our website, your solution for ...',
            'meta_keywords' => 'home, website, solutions',
            'canonical_url' => url('/'), // URL canonical untuk halaman home
        ]);

        SEO::create([
            'page' => 'about',
            'title' => 'About Us - Your Company',
            'meta_description' => 'Learn more about our company and our story.',
            'meta_keywords' => 'about, company, team, mission',
            'canonical_url' => url('/about'), // URL canonical untuk halaman about
        ]);

        SEO::create([
            'page' => 'service',
            'title' => 'Our Services - What We Offer',
            'meta_description' => 'Explore the wide range of services we offer.',
            'meta_keywords' => 'service, offer, solutions, professional',
            'canonical_url' => url('/service'), // URL canonical untuk halaman service
        ]);

        SEO::create([
            'page' => 'fleet',
            'title' => 'Our Fleet - Explore Our Vehicles',
            'meta_description' => 'Discover the fleet of vehicles we have for your needs.',
            'meta_keywords' => 'fleet, vehicles, transportation',
            'canonical_url' => url('/fleet'), // URL canonical untuk halaman fleet
        ]);

        SEO::create([
            'page' => 'contact',
            'title' => 'Contact Us - Get in Touch',
            'meta_description' => 'Have any questions? Get in touch with us.',
            'meta_keywords' => 'contact, support, customer service',
            'canonical_url' => url('/contact'), // URL canonical untuk halaman contact
        ]);
    }
}
