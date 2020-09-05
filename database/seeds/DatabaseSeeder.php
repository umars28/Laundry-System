<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ContactUsTableSeeder::class);
        $this->call(AboutsTableSeeder::class);
        $this->call(SiteSettingTableSeeder::class);
        $this->call(PaketsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(KaryawansTableSeeder::class);
        $this->call(StatusPesanansTableSeeder::class);
        $this->call(StatusPembayaransTableSeeder::class);
        $this->call(MetodePembayaransTableSeeder::class);
        $this->call(BankAccountsTableSeeder::class);
    }
}
