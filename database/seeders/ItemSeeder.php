<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use DB;
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Spite',
            'code' => '10112'
        ]);
        DB::table('items')->insert([
            'name' => 'Coke',
            'code' => '10113'
        ]);
        DB::table('items')->insert([
            'name' => 'Pepsi',
            'code' => '10220'
        ]);
    }
}
