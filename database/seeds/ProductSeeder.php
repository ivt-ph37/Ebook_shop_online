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
            ["CC Thần tốc luyện đề 2020 tập 1","AVATA-1-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",2,1,1],
            ["CC Thần tốc luyện đề 2020 tập 2","AVATA-2-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,200000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",2,1,1],
            ["CC HPT quốc gia môn Vật lý","AVATA-3-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,300000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",3,1,1],
            ["Bí quyết tăng nhanh điểm kiểm tra toán 6","AVATA-4-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",3,1,1],
            ["CC Thần tốc luyện đề 2020 tập 5","AVATA-4-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,200000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",4,1,1],
            ["Đột phá 8+ luyện thi khối A01","AVATA-1-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,300000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",4,1,1],
            ["CC Thần tốc luyện đề 2020 tập 7","AVATA-2-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",5,1,1],
            ["CC Thần tốc luyện đề 2020 tập 8","AVATA-3-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,200000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",5,1,1],
            ["CC Thần tốc luyện đề 2020 tập 9","AVATA-4-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,300000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",1,1,1],
            ["Bí quyết chinh phục điểm cao Toán 7 Tập 1","AVATA-4-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",1,1,1],
            ["CC Thần tốc luyện đề 2020 tập 11","AVATA-1-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,200000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",6,1,1],
            ["CC Thần tốc luyện đề 2020 tập 12","AVATA-2-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,300000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",6,1,1],
            ["CC Thần tốc luyện đề 2020 tập 13","AVATA-3-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",7,1,1],
            ["CC Thần tốc luyện đề 2020 tập 14","AVATA-4-300x300.png","CC thần tốc luyện đề chinh phục kì thi THPT",10,100000,0.1," tập 2 của CC thần tốc luyện đề chinh phục kì thi THPT Quốc gia 2020 môn",7,1,1],
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
