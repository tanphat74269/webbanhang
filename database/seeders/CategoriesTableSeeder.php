<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class CategoriesTableSeeder extends Seeder
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
                'cate_name'=>'Xe máy',
                'cate_slug'=>Str::slug('Xe máy')
            ],
            [
                'cate_name'=>'Quần áo',
                'cate_slug'=>Str::slug('Quần áo')
            ],
            [
                'cate_name'=>'Máy tính',
                'cate_slug'=>Str::slug('Máy tính')
            ],
            [
                'cate_name'=>'Điện thoại',
                'cate_slug'=>Str::slug('Điện thoại')
            ],
            [
                'cate_name'=>'Máy ảnh',
                'cate_slug'=>Str::slug('Máy ảnh')
            ],
            [
                'cate_name'=>'Ba lô',
                'cate_slug'=>Str::slug('Ba lô')
            ],
            [
                'cate_name'=>'Tivi',
                'cate_slug'=>Str::slug('Tivi')
            ],
            [
                'cate_name'=>'Tủ lạnh',
                'cate_slug'=>Str::slug('Tủ lạnh')
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
