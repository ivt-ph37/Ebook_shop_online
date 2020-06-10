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
        // $this->call(UsersTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductStatus::class);
        $this->call(ProducerSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TransactionStatusSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(TransactionProductSeeder::class);
        $this->call(AdressSeeder::class);

    }
}
