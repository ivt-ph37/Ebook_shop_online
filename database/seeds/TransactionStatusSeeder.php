<?php

use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('transaction_statuses')->truncate();
        $tran_statuses = [
            ['1','Chưa Xử Lý'],
            ['2','Đã Đóng Gói'],
            ['3','Đang Giao'],
            ['4','Đã Giao'],
            ['5','Đã Hủy'],
        ];
        foreach ($tran_statuses as $trans_status) {
            App\TransactionStatus::create([
                'name'=>$trans_status[1],
            ]);
        }


        Schema::enableForeignKeyConstraints();
    }
}
