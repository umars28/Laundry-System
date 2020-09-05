<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class MetodePembayaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::insert([
            ['method' => 'TRANSFER'],
            ['method' => 'COD']
        ]);
    }
}
