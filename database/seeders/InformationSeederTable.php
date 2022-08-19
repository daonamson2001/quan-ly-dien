<?php

namespace database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class InformationSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informations')->insert([
            'inf_name' => 'EVN Khánh Hòa',
            'inf_address' => '101 Mai Xuân Thưởng, phường Vĩnh Hải, tp.Nha Trang, tỉnh Khánh Hòa',
            'inf_phone' => '0337136172',
            'inf_email' => '0974619741danh@gmail.com',
            'inf_website' => 'localhost:8000',
        ]);
    }
}
