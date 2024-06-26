<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Quản trị viên',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('quanly'),
                'avatar' => 'public/asset/img/ceo.png'
            ],
            [
                'name' => 'Người dùng',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('user123'),
                'avatar' => 'public/asset/img/user.png'
            ]
        ];
        DB::table('web_users')->insert($data);
    }
}
