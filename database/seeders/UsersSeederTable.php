<?php

namespace database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        DB::table('users')->insert([
            'username'=>'admin',
            'password'=>bcrypt('123456'),
            'fullname'=> "Duy Danh",
            'gender'=>"Nam",
            'identification' => "197400910",
            'birth'=>'2000-01-01',
            'address'=>"Nha Trang",
            'phone'=>'0337136172',
            'email'=>"0974619741",
            'joining'=>'2000-01-01',
            'dpm_id'=>'1',
        ]);
    //     for ($i=0; $i < 200; $i++) { 
    //         # code...       
    //          DB::table('users')->insert([
    //             'username'=>$faker->word.$i,
    //             'password'=>bcrypt('123456'),
    //             'fullname'=> $faker->name,
    //             'gender'=>"Nam",
    //             'identification' => $faker->numberBetween($min = 1000000000, $max = 9999999999),
    //             'birth'=>$faker->date($format = 'Y-m-d', $max = '2002-06-09'),
    //             'address'=>$faker->country,
    //             'phone'=>'0'.$faker->numberBetween($min = 100000000, $max = 999999999),
    //             'email'=>$faker->email,
    //             'joining'=>$faker->date($format = 'Y-m-d', $max = 'now'),
    //             'dpm_id'=>$faker->numberBetween($min = 1, $max = 4),
    //         ]);
    //     }

    }
}
