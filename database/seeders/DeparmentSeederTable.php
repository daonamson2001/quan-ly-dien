<?php

namespace database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DeparmentSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->insert([
            'dpm_name'=>'Admin',
        ]);
        DB::table('departments')->insert([
            'dpm_name'=>'Lãnh Đạo',
        ]);
        DB::table('departments')->insert([
            'dpm_name'=>'Quản Lí',
        ]);
        DB::table('departments')->insert([
            'dpm_name'=>'Nhân Viên',
        ]);
    }
}
