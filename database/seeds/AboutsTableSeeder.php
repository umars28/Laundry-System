<?php

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = About::create([
            'title' => 'About Us',
            'description' => 'Perusahaan kami adalah perusahaan yang bergerak dalam bidang jasa khususnya jasa laundry.'
        ]);
    }
}
