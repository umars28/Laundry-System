<?php

use Illuminate\Database\Seeder;
use App\Models\ContactUs;

class ContactUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactUs::create([
            'contact_number' => '085341770639',
            'email' => 'umarsabirin369@gmail.com',
            'facebook' => 'umarc.speedy.1',
            'twitter' => 'umar_s28',
            'instagram' => 'umar_s28',
            'whatsapp' => '085341770639'
        ]);
    }
}
