<?php

use Illuminate\Database\Seeder;

class AdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $addresses = array(
            array('id' => '1','name' => 'Đà Nẵng','parrent_id' => NULL,'created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '2','name' => 'Hồ Chí Minh','parrent_id' => NULL,'created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '3','name' => 'Hà Nội','parrent_id' => NULL,'created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '4','name' => 'Nha Trang','parrent_id' => NULL,'created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '5','name' => 'Vũng Tàu','parrent_id' => NULL,'created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '6','name' => 'Thanh Hóa','parrent_id' => NULL,'created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '7','name' => 'Bình Định','parrent_id' => NULL,'created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '8','name' => 'Quy Nhơn','parrent_id' => NULL,'created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '9','name' => 'Thanh Khê','parrent_id' => '1','created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '10','name' => 'Hải Châu','parrent_id' => '1','created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '11','name' => 'Sơn Trà','parrent_id' => '1','created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '12','name' => 'Xuân Hà','parrent_id' => '9','created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '13','name' => 'Thạch Gián','parrent_id' => '9','created_at' => '2019-04-29 03:32:54','updated_at' => '2019-04-29 03:32:54'),
            array('id' => '14','name' => 'Ba Đình','parrent_id' => '3','created_at' => '2019-06-01 23:38:15','updated_at' => '2019-06-01 23:39:56'),
            array('id' => '15','name' => 'Hoàn Kiếm','parrent_id' => '3','created_at' => '2019-06-01 23:38:30','updated_at' => '2019-06-01 23:39:29'),
            array('id' => '16','name' => 'Tây Hồ','parrent_id' => '3','created_at' => '2019-06-01 23:38:57','updated_at' => '2019-06-01 23:38:57'),
            array('id' => '17','name' => 'Long Biên','parrent_id' => '3','created_at' => '2019-06-01 23:39:07','updated_at' => '2019-06-01 23:39:07'),
            array('id' => '18','name' => 'Cầu Giấy','parrent_id' => '3','created_at' => '2019-06-01 23:39:14','updated_at' => '2019-06-01 23:39:14'),
            array('id' => '19','name' => 'Kim Mã','parrent_id' => '14','created_at' => '2019-06-01 23:43:35','updated_at' => '2019-06-01 23:43:35'),
            array('id' => '20','name' => 'Liễu Giai','parrent_id' => '14','created_at' => '2019-06-01 23:43:46','updated_at' => '2019-06-01 23:43:46'),
            array('id' => '21','name' => 'Mai Dịch','parrent_id' => '18','created_at' => '2019-06-01 23:44:16','updated_at' => '2019-06-01 23:44:16'),
            array('id' => '22','name' => 'Dịch Vọng','parrent_id' => '18','created_at' => '2019-06-01 23:44:27','updated_at' => '2019-06-01 23:44:27'),
            array('id' => '23','name' => 'Quận 1','parrent_id' => '2','created_at' => '2019-06-01 23:45:38','updated_at' => '2019-06-01 23:45:38'),
            array('id' => '24','name' => 'Quận 12','parrent_id' => '2','created_at' => '2019-06-01 23:45:44','updated_at' => '2019-06-01 23:45:44'),
            array('id' => '25','name' => 'Bình Thạnh','parrent_id' => '2','created_at' => '2019-06-01 23:45:52','updated_at' => '2019-06-01 23:45:52'),
            array('id' => '26','name' => 'Phường 1','parrent_id' => '25','created_at' => '2019-06-01 23:46:25','updated_at' => '2019-06-01 23:46:25'),
            array('id' => '27','name' => 'Phường 2','parrent_id' => '25','created_at' => '2019-06-01 23:46:33','updated_at' => '2019-06-01 23:46:33'),
            array('id' => '28','name' => 'Phường 3','parrent_id' => '25','created_at' => '2019-06-01 23:46:48','updated_at' => '2019-06-01 23:46:48'),
            array('id' => '29','name' => 'Bến Thành','parrent_id' => '23','created_at' => '2019-06-01 23:47:28','updated_at' => '2019-06-01 23:47:28'),
            array('id' => '30','name' => 'Cầu Kho','parrent_id' => '23','created_at' => '2019-06-01 23:47:46','updated_at' => '2019-06-01 23:47:46'),
            array('id' => '31','name' => 'Cầu Ông Lãnh','parrent_id' => '23','created_at' => '2019-06-01 23:47:59','updated_at' => '2019-06-01 23:47:59')
        );
        foreach ($addresses as $item) {
            App\Address::create([
                'name'=>$item['name'],
                'parrent_id'=>$item['parrent_id'],
            ]);
        }
        Schema::enableForeignKeyConstraints();

        //
    }
}
