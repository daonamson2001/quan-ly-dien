<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DeparmentSeederTable::class,
            UsersSeederTable::class,
            // InformationSeederTable::class,
            DistrictSeederTable::class,
            // ProducerSeederTable::class,
            UnitsSeederTable::class,
            QualitiesSeederTable::class,
            // SuppliesSeederTable::class,
        ]);
    }
}
