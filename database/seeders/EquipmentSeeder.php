<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipments')->insert([
            'nama_equipment' => 'Genset',
            'quantity' => null,
            'biaya' => 'Include outsourcing',
            'keterangan' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Landscape (Taman)',
            'quantity' => null,
            'biaya' => 'Include outsourcing',
            'keterangan' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Apar',
            'quantity' => 44,
            'biaya' => 'Include outsourcing',
            'keterangan' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
