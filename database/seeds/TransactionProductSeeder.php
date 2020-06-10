<?php

use Illuminate\Database\Seeder;

class TransactionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('transaction_products')->truncate();

        $transactions = [
            [2,1,1,33333333],
            [2,2,1,33333333],
            [1,3,1,33333333],
            [2,1,2,10000000],
            [2,2,2,10000000],
            [1,3,2,10000000],
            [2,1,3,8000000],
            [2,2,3,8000000],
            [1,3,3,8000000],
            [1,4,3,8000000],
        ];

        foreach ($transactions as $transaction) {
            App\TransactionProduct::create([
                'amount'=>$transaction[0],
                'transaction_id'=>$transaction[1],
                'product_id'=>$transaction[2],
                'price'=>$transaction[3],
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
