<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'Test',
            'phone' => '082222222222',
            'email' => 'test@mail.com',
            'subject' => 'Testing',
            'message' => 'Testing',
            'is_read' => false,
        ]);
    }
}
