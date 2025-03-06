<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'logo' => 'logo.png',
            'phone' => '+62 818 1877 9955',
            'email' => 'sales@alfa5aviation.com',
            'instagram' => 'https://www.instagram.com',
            'linkedin' => 'https://www.linkedin.com',
            'tiktok' => 'https://www.tiktok.com',
            'facebook' => 'https://www.facebook.com',
            'whatsapp' => '082298141920',
            'address' => 'Graha Dirgantara 2nd floor unit H, Jl. Protokol Halim Perdanakusuma no.8, Jakarta Timur 13610',
            'footer_text' => 'Alfa5 Aviation specializes in providing exclusive private jet charter services around the world, especially within the Asia Pacific region.',
        ]);
    }
}
