<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('reviews')->truncate();
        $reviews = [
            ['good product',5,1,1],
            ['hey everyone best to bye', 5,2,2],
        ];
        foreach ($reviews as $review) {
            App\Review::create([
                'content'=>$review[0],
                'rating'=>$review[1],
                'product_id'=>$review[2],
                'user_id'=>$review[3]
            ]);
        }


        Schema::enableForeignKeyConstraints();
    }
}
