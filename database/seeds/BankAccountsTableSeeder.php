<?php

use Illuminate\Database\Seeder;
use App\Models\BankAccount;

class BankAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccount::insert([
            ['bank_account' => 'BNI', 'account_name' => 'UMAR SABIRIN', 'account_number' => '0838094683'],
            ['bank_account' => 'BRI', 'account_name' => 'UMAR SABIRIN', 'account_number' => '083809468313412']
        ]);
    }
}
