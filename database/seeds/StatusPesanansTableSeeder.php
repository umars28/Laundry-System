<?php

use Illuminate\Database\Seeder;
use App\Models\StatusPesanan;

class StatusPesanansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusPesanan::insert([
            ['status' => 'waiting confirmation', 'urutan' => 1],
            ['status' => 'diantar', 'urutan' => 2],
            ['status' => 'dicuci', 'urutan' => 3],
            ['status' => 'dijemur', 'urutan' => 4],
            ['status' => 'dilipat', 'urutan' => 5],
            ['status' => 'dijemput', 'urutan' => 6],
            ['status' => 'selesai', 'urutan' => 7],
            ['status' => 'cancelled', 'urutan' => 8],
        ]);
    }
}
