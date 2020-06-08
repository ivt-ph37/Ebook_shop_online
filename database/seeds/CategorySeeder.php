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
            ["id"=>"1","name"=>"Bí Quyết chinh phục điểm cao","parrent_id"=>null,"photo"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:56:02"],
            ["id"=>"2","name"=>"CC thần tốc luyện đề 2020","parrent_id"=>null,"photo"=>"fas fa-tv","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:51:39"],
            ["id"=>"3","name"=>"Combo","parrent_id"=>null,"photo"=>"fas fa-blender","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:53:01"],
            ["id"=>"4","name"=>"Sách luyện thi THCS","parrent_id"=>null,"photo"=>"fa fa-camera-retro","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"5","name"=>"Bí quyết Tăng nhanh điểm kiểm tra","parrent_id"=>null,"photo"=>"fa fa-laptop","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"6","name"=>"Đột phá 8+ kì thi THPT quốc gia","parrent_id"=>null,"photo"=>"fas fa-book","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:54:17"],
            ["id"=>"7","name"=>"Sách luyện thi THPT QG","parrent_id"=>null,"photo"=>"fas fa-headphones","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:46:47"],
            ["id"=>"8","name"=>"Sách theo môn","parrent_id"=>null,"photo"=>"far fa-keyboard","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:49:45"],
            ["id"=>"9","name"=>"Sách sắp phát hành","parrent_id"=>null,"photo"=>"far fa-keyboard","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:49:45"],
            ["id"=>"10","name"=>"Sách mới","parrent_id"=>null,"photo"=>"far fa-keyboard","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:49:45"],
            ["id"=>"11","name"=>"Sách ngoại ngữ","parrent_id"=>null,"photo"=>"far fa-keyboard","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-09-06 00:49:45"],
            ["id"=>"12","name"=>"Lớp 12","parrent_id"=>"1","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"13","name"=>"Lớp 11","parrent_id"=>"1","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"14","name"=>"Lớp 10","parrent_id"=>"1","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"15","name"=>"Lớp 9","parrent_id"=>"1","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"16","name"=>"Lớp 8","parrent_id"=>"1","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"17","name"=>"Lớp 7","parrent_id"=>"1","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"18","name"=>"Lớp 6","parrent_id"=>"1","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"19","name"=>"Đột phá 9+ thi vào 10 THPT","parrent_id"=>"4","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"20","name"=>"Chinh phục kỳ thi vào 10 chuyên","parrent_id"=>"4","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"21","name"=>"Lớp 6","parrent_id"=>"5","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"22","name"=>"Lớp 7","parrent_id"=>"5","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"23","name"=>"Lớp 8","parrent_id"=>"5","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"24","name"=>"Lớp 9","parrent_id"=>"5","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"25","name"=>"Lớp 10","parrent_id"=>"5","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"26","name"=>"Infographic chinh phục kỳ thi THPT quốc gia","parrent_id"=>"7","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"27","name"=>"Đột phá 8+","parrent_id"=>"7","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"28","name"=>"Ôn luyện thi trắc nghiệm THPT","parrent_id"=>"7","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"29","name"=>"Môn Tiếng Anh","parrent_id"=>"8","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"30","name"=>"Môn Địa","parrent_id"=>"8","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"31","name"=>"Môn Sử","parrent_id"=>"8","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"32","name"=>"Văn Học","parrent_id"=>"8","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"33","name"=>"Môn Toán","parrent_id"=>"8","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"34","name"=>"Môn Vật Lý","parrent_id"=>"8","photo"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"35","name"=>"Môn Hóa","parrent_id"=>"8","photo"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"36","name"=>"Môn Sinh","parrent_id"=>"8","photo"=>"fas fa-mobile-alt","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"37","name"=>"Tiếng Anh","parrent_id"=>"11","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"38","name"=>"TOIEC","parrent_id"=>"37","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"39","name"=>"IELTS","parrent_id"=>"37","photo"=>"fa fa-mobile","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"]

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
