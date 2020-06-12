<?php

use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();

        $roles = [
            [1,'Admin'],
            [2,'Nhân Viên'],
            [3,'Khách Hàng'],
        ];

        foreach ($roles as $role) {
            App\Role::create([
                'name'=>$role[1],
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
