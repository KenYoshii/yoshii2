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
            'producr_id' => '1',
            'created_at' => 'date('Y-m-d H:i:s')',
            'updated_at' => 'date('Y-m-d H:i:s')'
            ]);

        \DB::table('companies')->insert([
            'id' => '2',
            'producr_id' => '2',
            'created_at' => 'date('Y-m-d H:i:s')',
            'updated_at' => 'date('Y-m-d H:i:s')'
            ]);

        \DB::table('companies')->insert([
            'id' => '3',
            'producr_id' => '3',
            'created_at' => 'date('Y-m-d H:i:s')',
            'updated_at' => 'date('Y-m-d H:i:s')'
            ]);

        \DB::table('companies')->insert([
            'id' => '4',
            'producr_id' => '4',
            'created_at' => 'date('Y-m-d H:i:s')',
            'updated_at' => 'date('Y-m-d H:i:s')'
            ]);
    }
}
