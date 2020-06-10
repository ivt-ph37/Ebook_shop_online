<?php

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('transactions')->truncate();

        $items = [
            ['Nguyen Dinh Long',1,'123 Nguyen Luong Bang',1,1],
            ['Phan Van Tao',2,'123 Nguyen Luong Bang',2,1],
            ['Nguyen Cong',3,'123 Nguyen Luong Bang',1,1],
            ['Thi Nhan',4,'123 Nguyen Luong Bang',2,1],
        ];

        foreach ($items as $item) {
            App\Transaction::create([
                'full_name' => $item[0],
                'user_id' => $item[1],
                'street' => $item[2],
                'address_id' => $item[3],
                'status_id' => $item[4]
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
