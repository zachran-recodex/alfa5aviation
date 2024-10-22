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
        $pages = [
            [
                'title' => 'Home',
                'slug' => 'home',
                'meta_title' => 'Alfa5 Aviation | Home | Private Jet Charter',
                'meta_description' => 'Alfa 5 Aviation was founded in 2022 and has built its business from satisfied customer referrals. We continue to grow through the recommendations of our existing clients and this has formed the fundamental basis of how Alfa 5 Aviation operates.',
                'meta_keywords' => 'Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Aircraft Operator Indonesia, Charter Brokerage Services, Private Jet Charters, Air Charter Solutions, Airline Charter Services, Aircraft Management Indonesia, Aviation Logistics, Flight Planning and Scheduling, Business Aviation Indonesia, Luxury Travel Experiences, Executive Air Travel, VIP Charter Services, Air Charter Marketplace, Flight Operations Indonesia, Aircraft Fleet Management, Aviation Consulting Services, Air Charter Brokerage, Jet Rental Services, Corporate Travel Solutions, Aircraft Leasing Indonesia',
            ],
            [
                'title' => 'About Us',
                'slug' => 'about',
                'meta_title' => 'Alfa5 Aviation | About | Private Jet Charter',
                'meta_description' => 'Alfa 5 Aviation was founded in 2022 and has built its business from satisfied customer referrals. We continue to grow through the recommendations of our existing clients and this has formed the fundamental basis of how Alfa 5 Aviation operates.',
                'meta_keywords' => 'Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Aircraft Operator Indonesia, Charter Brokerage Services, Private Jet Charters, Air Charter Solutions, Airline Charter Services, Aircraft Management Indonesia, Aviation Logistics, Flight Planning and Scheduling, Business Aviation Indonesia, Luxury Travel Experiences, Executive Air Travel, VIP Charter Services, Air Charter Marketplace, Flight Operations Indonesia, Aircraft Fleet Management, Aviation Consulting Services, Air Charter Brokerage, Jet Rental Services, Corporate Travel Solutions, Aircraft Leasing Indonesia',
            ],
            [
                'title' => 'Services',
                'slug' => 'service',
                'meta_title' => 'Alfa5 Aviation | Services | Private Jet Charter',
                'meta_description' => 'Alfa 5 Aviation was founded in 2022 and has built its business from satisfied customer referrals. We continue to grow through the recommendations of our existing clients and this has formed the fundamental basis of how Alfa 5 Aviation operates.',
                'meta_keywords' => 'Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Aircraft Operator Indonesia, Charter Brokerage Services, Private Jet Charters, Air Charter Solutions, Airline Charter Services, Aircraft Management Indonesia, Aviation Logistics, Flight Planning and Scheduling, Business Aviation Indonesia, Luxury Travel Experiences, Executive Air Travel, VIP Charter Services, Air Charter Marketplace, Flight Operations Indonesia, Aircraft Fleet Management, Aviation Consulting Services, Air Charter Brokerage, Jet Rental Services, Corporate Travel Solutions, Aircraft Leasing Indonesia',
            ],
            [
                'title' => 'News',
                'slug' => 'blog',
                'meta_title' => 'Alfa5 Aviation | News | Private Jet Charter',
                'meta_description' => 'Alfa 5 Aviation was founded in 2022 and has built its business from satisfied customer referrals. We continue to grow through the recommendations of our existing clients and this has formed the fundamental basis of how Alfa 5 Aviation operates.',
                'meta_keywords' => 'Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Aircraft Operator Indonesia, Charter Brokerage Services, Private Jet Charters, Air Charter Solutions, Airline Charter Services, Aircraft Management Indonesia, Aviation Logistics, Flight Planning and Scheduling, Business Aviation Indonesia, Luxury Travel Experiences, Executive Air Travel, VIP Charter Services, Air Charter Marketplace, Flight Operations Indonesia, Aircraft Fleet Management, Aviation Consulting Services, Air Charter Brokerage, Jet Rental Services, Corporate Travel Solutions, Aircraft Leasing Indonesia',
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact',
                'meta_title' => 'Alfa5 Aviation | Contact | Private Jet Charter',
                'meta_description' => 'Alfa 5 Aviation was founded in 2022 and has built its business from satisfied customer referrals. We continue to grow through the recommendations of our existing clients and this has formed the fundamental basis of how Alfa 5 Aviation operates.',
                'meta_keywords' => 'Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Aircraft Operator Indonesia, Charter Brokerage Services, Private Jet Charters, Air Charter Solutions, Airline Charter Services, Aircraft Management Indonesia, Aviation Logistics, Flight Planning and Scheduling, Business Aviation Indonesia, Luxury Travel Experiences, Executive Air Travel, VIP Charter Services, Air Charter Marketplace, Flight Operations Indonesia, Aircraft Fleet Management, Aviation Consulting Services, Air Charter Brokerage, Jet Rental Services, Corporate Travel Solutions, Aircraft Leasing Indonesia',
            ],
            [
                'title' => 'Fleets',
                'slug' => 'fleet',
                'meta_title' => 'Alfa5 Aviation | Fleet | Private Jet Charter',
                'meta_description' => 'Alfa 5 Aviation was founded in 2022 and has built its business from satisfied customer referrals. We continue to grow through the recommendations of our existing clients and this has formed the fundamental basis of how Alfa 5 Aviation operates.',
                'meta_keywords' => 'Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Private Jet Charter, Aviation Consultant, Aviation Services, Aircraft Management, Sewa Private Jet Bali, Sewa Private Jet Jakarta, Sewa Private Jet, Medical Air Ambulance Flight, Private Jet Charter Bali, Private Jet Charter Indonesia, Private Jet Charter Jakarta, Private Jet Charter for Business, Private Jet Management Services, Sewa Private Jet Indonesia, Aircraft Operator Indonesia, Charter Brokerage Services, Private Jet Charters, Air Charter Solutions, Airline Charter Services, Aircraft Management Indonesia, Aviation Logistics, Flight Planning and Scheduling, Business Aviation Indonesia, Luxury Travel Experiences, Executive Air Travel, VIP Charter Services, Air Charter Marketplace, Flight Operations Indonesia, Aircraft Fleet Management, Aviation Consulting Services, Air Charter Brokerage, Jet Rental Services, Corporate Travel Solutions, Aircraft Leasing Indonesia',
            ],
        ];

        foreach ($pages as $page) {
            PageSetup::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
