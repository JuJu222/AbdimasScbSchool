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
        $this->call(EquipmentSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(PreventiveMaintenanceSeeder::class);
        $this->call(CurrativeMaintenanceSeeder::class);
    }
}
