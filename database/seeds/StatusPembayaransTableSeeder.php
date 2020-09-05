<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentStatus;

class StatusPembayaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentStatus::insert([
            ['status' => 'waiting confirmation', 'urutan' => 1],
            ['status' => 'unpaid', 'urutan' => 2],
            ['status' => 'paid', 'urutan' => 3],
            ['status' => 'cancelled', 'urutan' => 4]
        ]);
    }
}
