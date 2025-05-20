<?php

namespace Database\Seeders\ContactUs;

use App\Models\ContactUs\ContactUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactUs::create([
            'email'        => 'complaintsnvc@gmail.com',
            'phone_number' => '+963 11 331 9073',
            'location'     => [
                'en' => 'Al Jesr Al Abiad - Dammam - Syria',
                'ar' => 'الجسر الأبيض - دمشق - سورية'
            ],
            'facebook' => 'https://www.facebook.com/share/1EtBKPQLZx/',
            'instagram' => 'https://www.instagram.com/nvcsyria?igsh=Z3RxbXNhdmo1ZjJy'
        ]);
    }
}
