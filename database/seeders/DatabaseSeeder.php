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
            RolePermissionSeeder::class,
            ServiceSeeder::class,
            PartnerSeeder::class,
            SettingSeeder::class,
            PageSetupSeeder::class,
            AboutSeeder::class,
            HeroSectionSeeder::class,
        ]);
    }
}
