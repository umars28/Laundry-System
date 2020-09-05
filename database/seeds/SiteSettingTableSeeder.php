<?php

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::insert([
            ['key' => 'MAIN_CONTENT_TITLE', 'value' => 'Selamat Datang'],
            ['key' => 'MAIN_CONTENT_DESCRIPTION', 'value' => 'Dtech Laundy'],
            ['key' => 'MAIN_CONTENT_BACKGROUND', 'value' => 'home-bg.jpg'],
            ['key' => 'IMAGE_LOGO', 'value' => 'logo-sm.png'],
            ['key' => 'IMAGE_PAVICON', 'value' => 'logo-sm.png'],
            ['key' => 'COMPANY_NAME', 'value' => 'Dtech'],
            ['key' => 'COMPANY_ADDRESS', 'value' => 'Makassar'],
            ['key' => 'COMPANY_STREET', 'value' => 'Jalan Adhyaksa 1']
        ]);
    }
}
