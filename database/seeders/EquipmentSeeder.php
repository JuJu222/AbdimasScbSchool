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
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Landscape (Taman)',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Pemotongan rumput',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Penggulmaan',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Penyiraman',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Roundoup rumput liar',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Pembersihan Paving Block',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Drainase (Selokan)',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Apar',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Kendaraan Transportasi',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Panel Listrik',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Air Conditioner 0,75 PK',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Air Conditioner 1 PK',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Air Conditioner 1,5 PK',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Air Conditioner 2 PK',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Air Conditioner 5 PK',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Lampu Outdoor (Taman/Wallsign/Neonsign)',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Lampu signage',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Pembersihan huruf',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Vacuum cleaner',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Hand sanitizer',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Pembersihan akrilik',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Pembersihan kaca ruang',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('equipments')->insert([
            'nama_equipment' => 'Perawatan lapangan',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
