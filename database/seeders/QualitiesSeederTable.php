<?php
namespace database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualitiesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('qualities')->insert([
            'qua_name' => 'Cao',
        ]);
        DB::table('qualities')->insert([
            'qua_name' => 'Tốt',
        ]);
        DB::table('qualities')->insert([
            'qua_name' => 'Trung Bình',
        ]);
        DB::table('qualities')->insert([
            'qua_name' => 'Xấu',
        ]);
        DB::table('qualities')->insert([
            'qua_name' => 'Kém',
        ]);
    }
}

