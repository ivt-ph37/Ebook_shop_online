<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();

        $users = array(
            array('id' => '1','name' => 'nhan vien','phone_number' => '090510101010','email' => 'nhanvien1@gmail.com','email_verified_at' => NULL,'address' => 'bui tan dien','password' => '$2y$10$vfjWRraDDmHsMYM8Pv3X.OY9PQ.ZazE8Humx8PKr0U2pu.algsK.G','profile_photo' => '0mK3_baner2.png','remember_token' => 'AOGiCotN5HyAag2KUAFsIsUgVDyt98n4WRvfn8ByV6HGSus588kuhORkjs6v','address_id' => '12','birthday' => '1998-09-04 22:10:51','created_at' => '2019-04-25 18:12:18','updated_at' => '2019-09-14 10:37:09')	,
            array('id' => '2','name' => 'nhan vien 2','phone_number' => 'null','email' => 'nhanvien2@gmail.com','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$JitXUsqlIKfWgmluaDg.Eu2BoGoYWtVNupO5w1V42Fh0sPBQ2VyH6','profile_photo' => 'i4cp_doi-tra.jpg','remember_token' => '3CVY7BqXgm47LkzrvkM9rD0sM9zJT4qj6J6jsh6geWozNwYZB3vmqVmVyEyF','address_id' => '12','birthday' => '1998-09-04 22:10:51','created_at' => '2019-04-25 18:14:11','updated_at' => '2019-08-21 16:09:36'),
            array('id' => '3','name' => 'lê văn hoàng 5','phone_number' => '90537283','email' => 'khachhang@gmail.com','email_verified_at' => '2019-04-26 04:50:39','address' => '225 Trần Cao Vân','password' => '$2y$10$V5WxMt.0HVn9e1r98UcUoO6ts8G6RjWemaJB9u1qb3jVoYC5xQaKG','profile_photo' => 'aRDc_c287e30e-23a9-47e7-bd68-70280835a2e8.png','remember_token' => 'nW6XRQ5A9aSJZZtF1pvl4ldvuIFsJLrdLIx0PiB6KhqlRbKxWcyEtWSO6q4W','address_id' => '12','birthday' => '1998-04-26 04:47:57','created_at' => '2019-04-26 04:47:57','updated_at' => '2019-08-31 11:03:40'),
            array('id' => '4','name' => 'Admin 1','phone_number' => '0905555777','email' => 'admin@gmail.com','email_verified_at' => '2019-04-26 11:39:17','address' => '15 Lê Duẩn','password' => '$2y$10$voiAkjA.0KrS/.aBE8y9uuS5WE49PK7vgdMrHyuiIZEsRNoRaDM0y','profile_photo' => 'pk9R_bao-mat.jpg','remember_token' => '6gIltph4DoTstDO5xpKkIacrxlY3iUDjJhzWzCHY7WF3NwJnQ2AvNPVREw5r','address_id' => '12','birthday' => '1998-09-04 22:10:51','created_at' => '2019-04-26 11:38:37','updated_at' => '2019-09-12 08:22:47'),
            array('id' => '5','name' => 'Nhan vien so 3','phone_number' => 'null','email' => 'nhanvien3@gmail.com','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$cibaIqhc.X5dzOpzQEYiOu/hbZnZwGmUxIRnoPgBMYK0KZWZhldSW','profile_photo' => 'null','remember_token' => NULL,'address_id' => '1','birthday' => '1998-09-04 22:10:51','created_at' => '2019-05-31 02:43:36','updated_at' => '2019-08-06 16:46:51'),
            array('id' => '6','name' => 'Lưu An','phone_number' => '90537283','email' => 'khachhang4@gmail.com','email_verified_at' => '2019-06-01 17:16:09','address' => 'Hoảng hoa tham','password' => '$2y$10$NI3wMij5pJKKNMW.yNPbju2n1ZF3PqYHp2mP3ePySzTTcAMOquI.W','profile_photo' => 'nv8r_15594094861808455155095152816166.jpg','remember_token' => 'drjeAIgt7JFsY0mmYmzklf07OCGHN7661nln7FDNfBAOY55EFqOdhFjUOYrf','address_id' => '13','birthday' => '1998-09-04 22:10:51','created_at' => '2019-06-01 16:21:06','updated_at' => '2019-08-21 16:15:22'),
            array('id' => '7','name' => '123456','phone_number' => '090550399','email' => 'khachhang2@gmail.com','email_verified_at' => NULL,'address' => 'Le Dai Hanh','password' => '$2y$10$qI0Qab.SosH.WLny78Sb1OpBhPzqYB5.J04dy5aIzwO5GsIt04asy','profile_photo' => 'SVug_1-80e7f3aa-a076-4fca-b132-1be424b13f0b.jpg','remember_token' => NULL,'address_id' => '29','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-01 01:05:15','updated_at' => '2019-09-01 01:11:57'),
            array('id' => '11','name' => 'le an','phone_number' => NULL,'email' => 'khachhang3@gmail.com','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$Vt4ZLVQVTD1.qRfqX3vJAOpdSGUr/6B5CvW.dn5U6aagbahlJY4My','profile_photo' => NULL,'remember_token' => NULL,'address_id' => '1','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-01 01:29:48','updated_at' => '2019-09-01 01:29:48'),
            array('id' => '12','name' => 'le b','phone_number' => NULL,'email' => 'khachhang5@gmail.com','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$NIjmZhIg.Zl1ga2FdkPqVOz6S1xYnWgru2KjZTp8AgLjnbDqBH80e','profile_photo' => NULL,'remember_token' => NULL,'address_id' => '20','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-01 01:31:25','updated_at' => '2019-09-01 01:31:25'),
            array('id' => '13','name' => '123456','phone_number' => NULL,'email' => 'khachhang6@gmail.com','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$O3m/1GSI1nS1mc/9H0C3eu0Rsbu5UPsuuzOgAURtVe6ey2w7M.GB2','profile_photo' => NULL,'remember_token' => NULL,'address_id' => '26','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-01 01:32:59','updated_at' => '2019-09-01 01:32:59'),
            array('id' => '14','name' => '123456','phone_number' => NULL,'email' => 'khachhang7@gmail.com','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$eOf1OFRq3KRe8m6arEjIPO328Vtr7TxWSpdgQiwX5lSr.Pvkt3fwW','profile_photo' => NULL,'remember_token' => NULL,'address_id' => '20','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-01 01:35:08','updated_at' => '2019-09-01 01:35:08'),
            array('id' => '15','name' => 'gdfgdf','phone_number' => NULL,'email' => 'khachhang8@gmail.com','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$OPDI76byuqdxnebPhzZCTuoZY7DH02bt7WesTGSu9oZ2RHHEobG2K','profile_photo' => NULL,'remember_token' => NULL,'address_id' => '20','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-01 01:37:31','updated_at' => '2019-09-01 01:37:31'),
            array('id' => '16','name' => 'gfgdfg','phone_number' => NULL,'email' => 'khachhang9@gmail.com','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$6CN5nPG1GIoKGicKNGSaDe0xg8skW3xhytri/sSMkq5NEoSpz8qGW','profile_photo' => NULL,'remember_token' => NULL,'address_id' => '21','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-01 01:39:55','updated_at' => '2019-09-01 01:39:55'),
            array('id' => '17','name' => '123456','phone_number' => NULL,'email' => 'khachhang10','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$MeYc4.RsCdQCozKh7EHw1OL.c1WgXUfesSXPSzL.6qdBZJZ7MjoSm','profile_photo' => NULL,'remember_token' => NULL,'address_id' => '22','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-01 01:40:39','updated_at' => '2019-09-01 01:40:39'),
            array('id' => '18','name' => 'gdfjhgdkjfg','phone_number' => NULL,'email' => 'khachhang1','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$f6O1cfjaY2jtQ7nWYIa5/.KW5J1I04aipICe1FFMxwXuLS3I/28lu','profile_photo' => NULL,'remember_token' => NULL,'address_id' => '24','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-01 01:43:19','updated_at' => '2019-09-01 01:43:19'),
            array('id' => '19','name' => 'Trần Sanh','phone_number' => NULL,'email' => 'khach1@gmail.com','email_verified_at' => NULL,'address' => NULL,'password' => '$2y$10$Hw/VFZAJIbdO26G2FgZTUOhZTiWNGVh/4t/8uOn.XaIavr3v/9FK2','profile_photo' => NULL,'remember_token' => NULL,'address_id' => '25','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-04 22:10:51','updated_at' => '2019-09-04 22:10:51'),
            array('id' => '20','name' => 'Lê Bá','phone_number' => '09058181811','email' => 'khach2@gmail.com','email_verified_at' => NULL,'address' => '45 Lê Hoàn','password' => '$2y$10$IfuiNJ98AGpgwS23xL03jemincWvYKK0mxnAVZ/8EY274zF3CMtKC','profile_photo' => 'S2Na_bao-hanh.jpg','remember_token' => NULL,'address_id' => '26','birthday' => '1998-09-04 22:10:51','created_at' => '2019-09-04 22:12:22','updated_at' => '2019-09-04 22:14:04')
        );
        foreach ($users as $item) {
            App\User::create([
                'name' => $item['name'],
                'phone_number'=>$item['phone_number'],
                'email'=>$item['email'],
                'address'=>$item['address'],
                'password'=>$item['password'],
                'address_id' =>$item['address_id'],
                'profile_photo'=>$item['profile_photo'],
                'birthday'=>$item['birthday'],

            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
