<?php

namespace Database\Seeders;

use App\Models\Bandara;
use App\Models\Kota;
use App\Models\Stasiun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //KOTA
        Kota::create([
            'name' => 'Yogyakarta'
        ]);
        Kota::create([
            'name' => 'Jakarta'
        ]);
        Kota::create([
            'name' => 'Bandung'
        ]);
        Kota::create([
            'name' => 'Surabaya'
        ]);
        Kota::create([
            'name' => 'Purwokerto'
        ]);
        Kota::create([
            'name' => 'Solo'
        ]);

        //STASIUN
        Stasiun::create([
            'name' => 'YOGYAKARTA',
            'kota_id' => 1,
        ]);
        Stasiun::create([
            'name' => 'LEMPUYANGAN',
            'kota_id' => 1,
        ]);
        Stasiun::create([
            'name' => 'GAMBIR',
            'kota_id' => 2,
        ]);
        Stasiun::create([
            'name' => 'PASARSENEN',
            'kota_id' => 2,
        ]);
        Stasiun::create([
            'name' => 'JATINEGARA',
            'kota_id' => 2,
        ]);
        Stasiun::create([
            'name' => 'BANDUNG',
            'kota_id' => 3,
        ]);
        Stasiun::create([
            'name' => 'KIARACONDONG',
            'kota_id' => 3,
        ]);
        Stasiun::create([
            'name' => 'GUBENG',
            'kota_id' => 4,
        ]);
        Stasiun::create([
            'name' => 'PASARTURI',
            'kota_id' => 4,
        ]);
        Stasiun::create([
            'name' => 'PURWOKERTO',
            'kota_id' => 5,
        ]);
        Stasiun::create([
            'name' => 'SOLOBALAPAN',
            'kota_id' => 6,
        ]);
        Stasiun::create([
            'name' => 'JEBRES',
            'kota_id' => 6,
        ]);
        
        //BANDARA
        Bandara::create([
            'name' => 'SOEKARNO-HATTA',
            'kota_id' => 2,
        ]);
        Bandara::create([
            'name' => 'HALIM PERDANAKUSUMA',
            'kota_id' => 2,
        ]);
        Bandara::create([
            'name' => 'ADISUCIPTO',
            'kota_id' => 1,
        ]);
        Bandara::create([
            'name' => 'YOGYAKARTA INTERNATIONAL AIRPORT',
            'kota_id' => 1,
        ]);
        Bandara::create([
            'name' => 'HUSEIN SASTRANEGARA',
            'kota_id' => 3,
        ]);
        Bandara::create([
            'name' => 'ADI SOEMARNO',
            'kota_id' => 6,
        ]);
        Bandara::create([
            'name' => 'JUANDA',
            'kota_id' => 4,
        ]);

        
    }
}
