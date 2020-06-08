<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        $products=[
            ["CC Thần tốc luyện đề 2020 môn Ngữ văn tập 2","AVATA-3-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",2,1,1],
            ["CC Thần tốc luyện đề 2020 môn Ngữ văn tập 3","AVATA-3-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",2,1,1],
            ["CC Thần tốc luyện đề 2020 môn Ngữ văn tập 4","AVATA-3-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",3,1,1],
            ["CC Thần tốc luyện đề 2020 môn Ngữ văn tập 5","AVATA-3-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",3,1,1],
            ["CC Thần tốc luyện đề 2020 môn Ngữ văn tập 6","AVATA-3-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",4,1,1],
            ["CC Thần tốc luyện đề 2020 môn Ngữ văn tập 7","AVATA-3-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",4,1,1],
            ["CC Thần tốc luyện đề 2020 môn Ngữ văn tập 8","AVATA-3-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",4,1,1],
            ];
        foreach ($products as $product) {
            App\Product::create([
                'name' => $product[0],
                'photo' => $product[1],
                'description' => $product[2],
                'amount' => $product[3],
                'price' => $product[4],
                'discount' => $product[5],
                'information' => $product[6],
                'category_id' => $product[7],
                'producer_id' => $product[8],
                'status_id' => $product[9]
            ]);
        }

        Schema::enableForeignKeyConstraints();
        //
    }
}
