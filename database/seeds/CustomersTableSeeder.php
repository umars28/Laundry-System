<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\User;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::insert([
            ['email' => 'customer1@gmail.com', 'phone_number' => '085341770633','name' => 'customer 1', 'username' => 'customer1', 'address' => 'makassar', 'password' => Hash::make('customer1')],
            ['email' => 'customer2@gmail.com', 'phone_number' => '085341770633','name' => 'customer 2', 'username' => 'customer2', 'address' => 'makassar', 'password' => Hash::make('customer2')]
        ]);

        User::insert([
            ['name' => 'customer 1', 'username' => 'customer1', 'email' => 'customer1@gmail.com', 'password' => Hash::make('customer1'), 'role' => 'customer'],
            ['name' => 'customer 2', 'username' => 'customer2', 'email' => 'customer2@gmail.com', 'password' => Hash::make('customer2'), 'role' => 'customer']
        ]);

    }
}
