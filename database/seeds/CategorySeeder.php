<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();

        $categories = [
            ["id"=>"1","name"=>"Thiếu Nhi","parrent_id"=>null,"photo"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:56:02"],
            ["id"=>"2","name"=>"Văn Học","parrent_id"=>null,"photo"=>"fas fa-tv","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:51:39"],
            ["id"=>"3","name"=>"Tâm Lý - Kỹ Năng Sống","parrent_id"=>null,"photo"=>"fas fa-blender","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:53:01"],
            ["id"=>"4","name"=>"Sách Học Ngoại Ngữ","parrent_id"=>null,"photo"=>"fa fa-camera-retro","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"5","name"=>"Kinh Tế","parrent_id"=>null,"photo"=>"fa fa-laptop","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"6","name"=>"Lịch Sử - Địa Lý","parrent_id"=>null,"photo"=>"fas fa-book","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:54:17"],
            ["id"=>"7","name"=>"Khoa Học Kỹ Thuật","parrent_id"=>null,"photo"=>"fas fa-headphones","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:46:47"],
            ["id"=>"8","name"=>"Nuôi Dạy Con","parrent_id"=>null,"photo"=>"fas fa-headphones","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:46:47"],
            ["id"=>"9","name"=>"Nữ Công Gia Chánh","parrent_id"=>null,"photo"=>"fas fa-headphones","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:46:47"],
            ["id"=>"10","name"=>"Chính Trị - Pháp Lý ","parrent_id"=>null,"photo"=>"fas fa-headphones","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:46:47"],
            ["id"=>"11","name"=>"Tiểu Sử Hồi Ký","parrent_id"=>null,"photo"=>"fas fa-headphones","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:46:47"],

        ];

        foreach ($categories as $cate) {
            App\Category::create([
                'name' => $cate['name'],
                'photo'=>$cate['photo'],
                'parrent_id'=>$cate['parrent_id']

            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
