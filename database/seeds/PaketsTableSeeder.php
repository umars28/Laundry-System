<?php

use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paket::create([
            'type' => 'Antar Jemput',
            'description' => 'Paket ini ada penambahan servis antar jemput dengan jarak maksimal 2 km',
            'price_kg' => 20000,
            'price_satuan' => 4000,
            'is_promo' => 1,
            'promo_name' => 'promoakhirtahun',
            'promo_code' => '2onudu3',
            'promo_price' => 3000
    ]);
        Paket::create([
            'type' => 'Biasa + Setrika',
            'description' => 'Paket ini seperti paket biasa namun paket ini terdapat servis seperti setrika dan parfum',
            'price_kg' => 12000,
            'price_satuan' => 2000,
            'is_promo' => 0
    ]);
        Paket::create([
            'type' => 'Biasa',
            'description' => 'Paket ini meliputi beberapa servis seperti cuci,jemur dan lipat',
            'price_kg' => 9000,
            'price_satuan' => 1000,
            'is_promo' => 0
        ]);
    }
}
