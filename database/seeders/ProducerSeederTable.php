<?php

namespace database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProducerSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $faker = \Faker\Factory::create();
        // for ($i=1; $i < 200; $i++) { 
        //     # code...       
        //      DB::table('producers')->insert([
        //         'pro_name'=>$faker->name,
        //         'pro_address'=>$faker->country,
        //         'pro_phone'=> '0'.$faker->numberBetween($min = 100000000, $max = 999999999),
        //         'pro_email'=> $faker->email,
        //         'pro_employee'=> $faker->name,
        //         'dis_id'=>$faker->numberBetween($min = 1, $max = 7),
        //     ]);
        // }
    }
}

