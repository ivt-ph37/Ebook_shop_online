<?php

use Illuminate\Database\Seeder;

class ProductStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('product_statuses')->truncate();
        $product_statuses = [
            ['1','Còn Hàng'],
            ['2','Hết Hàng'],
            ['3','Sản Phẩm Mới'],
        ];
        foreach ($product_statuses as $product_status) {
            App\ProductStatus::create([
                'name'=>$product_status[1],
            ]);
        }


        Schema::enableForeignKeyConstraints();
    }
}
