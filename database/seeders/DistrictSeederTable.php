<?php

namespace database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('districts')->insert([
            'dis_name'=>'Tây Bắc Bộ',
        ]);
        DB::table('districts')->insert([
            'dis_name'=>'Đông Bắc Bộ',
        ]);
        DB::table('districts')->insert([
            'dis_name'=>'Bắc Trung Bộ',
        ]);
        DB::table('districts')->insert([
            'dis_name'=>'Nam Trung Bộ',
        ]);
        DB::table('districts')->insert([
            'dis_name'=>'Tây Nguyên',
        ]);
        DB::table('districts')->insert([
            'dis_name'=>'Tây Nam Bộ',
        ]);
        DB::table('districts')->insert([
            'dis_name'=>'Đông Nam Bộ',
        ]);
    }
}