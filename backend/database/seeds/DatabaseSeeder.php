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
        $this->call('ValueListsSeeder');
        $this->call('CustomersSeeder');
        $this->call('ContactsSeeder');
        $this->call('ProductsSeeder');
        $this->call('QuotesSeeder');
        $this->call('OrdersSeeder');
        $this->call('InvoicesSeeder');
        $this->call('LinesSeeder');
    }
}
