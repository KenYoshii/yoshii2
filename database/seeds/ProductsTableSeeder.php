<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
            'id' => '1',
            'company_id' => '1',
            'product_name' => 'ミネラルウォーター',
            'price' => '100',
            'stock' => '10',
            'comment' => '富士山の天然水',
            'img_path' => '/Applications/MAMP/htdocs/yoshii2/storage/app/public/images/ミネラルウォーター.png'
            ]);

        \DB::table('products')->insert([
            'id' => '2',
            'company_id' => '2',
            'product_name' => 'オレンジジュース',
            'price' => '150',
            'stock' => '15',
            'comment' => 'おいしいやつ',
            'img_path' => '/Applications/MAMP/htdocs/yoshii2/public/storage/images/オレンジジュース.png'
            ]);

        \DB::table('products')->insert([
            'id' => '3',
            'company_id' => '3',
            'product_name' => 'コーヒー',
            'price' => '180',
            'stock' => '10',
            'comment' => 'ブルーマウンテン',
            'img_path' => '/Applications/MAMP/htdocs/yoshii2/public/storage/images/コーヒー.png',
            ]);

        \DB::table('products')->insert([
            'id' => '4',
            'company_id' => '2',
            'product_name' => 'コーラ',
            'price' => '200',
            'stock' => '20',
            'comment' => 'クラフトコーラ',
            'img_path' => '/Applications/MAMP/htdocs/yoshii2/public/storage/images/コーラ.png'
            ]);
    }
}
