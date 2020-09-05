<?php

use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use App\User;

class KaryawansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Karyawan::insert([
            ['email' => 'karyawan1@gmail.com', 'name' => 'karyawan 1', 'phone_number' => '085341770637', 'address' => 'makassar', 'username' => 'karyawan1', 'password' => Hash::make('karyawan')],
            ['email' => 'karyawan2@gmail.com', 'name' => 'karyawan 2', 'phone_number' => '085341770638', 'address' => 'makassar', 'username' => 'karyawan2', 'password' => Hash::make('karyawan')]
        ]);

        User::insert([
            ['name' => 'karyawan 1', 'username' => 'karyawan1', 'email' => 'karyawan1@gmail.com', 'password' => Hash::make('karyawan'), 'role' => 'karyawan'],
            ['name' => 'karyawan 2', 'username' => 'karyawan2', 'email' => 'karyawan2@gmail.com', 'password' => Hash::make('karyawan'), 'role' => 'karyawan']
        ]);
    }
}
