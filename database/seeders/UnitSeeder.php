<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'name' => '1 ltr',
            'measurement' => '1'
        ]);
        DB::table('units')->insert([
            'name' => '500 ml',
            'measurement' => '.5'
        ]);
        DB::table('units')->insert([
            'name' => '250 ml',
            'measurement' => '.25'
        ]);
    }
}
