<?php

use Illuminate\Database\Seeder;

class ProducerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('producers')->truncate();

        $producers=[
            ["id"=>"1","name"=>"Nha Sach Lac Viet","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"2","name"=>"Nha Sach Lac Hong","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"3","name"=>"Nha Sach SH","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"4","name"=>"Nha Sach Giao Duc","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
            ["id"=>"5","name"=>"Nha Sach Tre","created_at"=>"2019-04-29 03:32:54","updated_at"=>"2019-04-29 03:32:54"],
        ];
        foreach ($producers as $producer){
            App\Producer::create([
                    'id' => $producer['id'],
                    'name' => $producer['name']
                ]
            );
        }
        Schema::enableForeignKeyConstraints();

        //
    }
}
