<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AboutSeeder::class,
            BlogSeeder::class,
            ContactSeeder::class,
            FleetSeeder::class,
            HeroSectionSeeder::class,
            PartnerSeeder::class,
            ServiceSeeder::class,
            SettingSeeder::class,
            UserSeeder::class,
            PageSetupSeeder::class,
        ]);
    }
}
