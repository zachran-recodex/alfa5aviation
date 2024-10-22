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
            'favicon' => 'favicon.ico',
            'phone_one' => '+62 818 1877 9955',
            'phone_two' => '+62 818 1877 9955',
            'email_one' => 'sales@alfa5aviation.com',
            'email_two' => 'office@sagalapro.com',
            'instagram' => 'www.instagram.com',
            'linkedin' => 'www.linkedin.com',
            'tiktok' => 'www.tiktok.com',
            'facebook' => 'www.facebook.com',
            'whatsapp' => 'www.whatsapp.com',
            'address' => 'Graha Dirgantara 2nd floor unit H, Jl. Protokol Halim Perdanakusuma no.8, Jakarta Timur 13610',
            'footer_text' => 'Alfa5 Aviation specializes in providing exclusive private jet charter services around the world, especially within the Asia Pacific region.',
        ]);
    }
}
