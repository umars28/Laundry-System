<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            ['name' => 'Administrator', 'username' => 'Admin', 'email' => 'umarsabirin369@gmail.com', 'password' => bcrypt('admin'), 'role' => 'admin']
        ]);
    }
}
