<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('companies')->insert([
            'id' => '1',
            'company_name' => 'A社',
            'street_address' => '大阪府守口市佐太東町3-101-5',
            'representative_name' => '芝山 影只'
            ]);

        \DB::table('companies')->insert([
            'id' => '2',
            'company_name' => 'B社',
            'street_address' => '京都府京都市伏見区淀水垂町509-16',
            'representative_name' => '静間 崇政'
            ]);

        \DB::table('companies')->insert([
            'id' => '3',
            'company_name' => 'C社',
            'street_address' => '愛知県名古屋市北区金田町4-721-1',
            'representative_name' => '國府 広差化'
            ]);
    }
}
