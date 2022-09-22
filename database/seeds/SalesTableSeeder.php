<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sales')->insert([
            'id' => '1',
            'product_id' => '1'
            ]);

        \DB::table('sales')->insert([
            'id' => '2',
            'product_id' => '2'
            ]);

        \DB::table('sales')->insert([
            'id' => '3',
            'product_id' => '3'
            ]);

        \DB::table('sales')->insert([
            'id' => '4',
            'product_id' => '4'
            ]);
    }
}
