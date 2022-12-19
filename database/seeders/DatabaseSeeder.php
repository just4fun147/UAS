<?php

namespace Database\Seeders;

use App\Models\Bandara;
use App\Models\Bus;
use App\Models\JPesawat;
use App\Models\Kereta;
use App\Models\Terminal;
use App\Models\Kota;
use App\Models\User;
use App\Models\Pesawat;
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
        //MASKAPAI PESAWAT
        User::create([
            'name' => 'Garuda Indonesia',
            'email' => 'garuda@gmail.com',
            'password' => bcrypt('123aA!'),
            'type' => 2
        ]);
        //MASKAPAI KERETA
        User::create([
            'name' => 'KAI Indonesia',
            'email' => 'kai@gmail.com',
            'password' => bcrypt('123aA!'),
            'type' => 3
        ]);
        //AGEN BUS
        User::create([
            'name' => 'EKA',
            'email' => 'SKENCANA@gmail.com',
            'password' => bcrypt('123aA!'),
            'type' => 4
        ]);
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

        //Terminal
        Terminal::create([
            'name' => 'GIWANGAN',
            'kota_id' => 1,
        ]);
        Terminal::create([
            'name' => 'GIWANGAN',
            'kota_id' => 1,
        ]);
        Terminal::create([
            'name' => 'GAMPING',
            'kota_id' => 1,
        ]);
        Terminal::create([
            'name' => 'SENEN',
            'kota_id' => 2,
        ]);
        Terminal::create([
            'name' => 'MANGGARAI',
            'kota_id' => 2,
        ]);
        Terminal::create([
            'name' => 'PULO GADUNG',
            'kota_id' => 2,
        ]);
        Terminal::create([
            'name' => 'RAGUNAN',
            'kota_id' => 2,
        ]);
        Terminal::create([
            'name' => 'PULO GEBANG',
            'kota_id' => 2,
        ]);
        Terminal::create([
            'name' => 'RAWAMANGUN',
            'kota_id' => 2,
        ]);
        Terminal::create([
            'name' => 'CICAHEUM',
            'kota_id' => 3,
        ]);
        Terminal::create([
            'name' => 'ANTAPANI',
            'kota_id' => 3,
        ]);
        Terminal::create([
            'name' => 'PASARTURI',
            'kota_id' => 4,
        ]);
        Terminal::create([
            'name' => 'WONOKROMO',
            'kota_id' => 4,
        ]);
        Terminal::create([
            'name' => 'BULUPITU',
            'kota_id' => 5,
        ]);
        Terminal::create([
            'name' => 'TIRTONADI',
            'kota_id' => 6,
        ]);
        
        //PESAWAT
        Pesawat::create([
            'name' => 'Garuda Indonesia',
            'user_id' => 1,
            'from_id' => 1,
            'to_id' => 2,
            'kelas' => '1',
            'jadwal_keberangkatan' => '2022-12-07',
            'jam_keberangkatan' => '07.00',
            'jadwal_tiba' => '2022-12-07',
            'jam_tiba' => '08.00'
        ]);
        //Kereta
        Kereta::create([
            'name' => 'Senja Utama',
            'user_id' => 2,
            'from_id' => 5,
            'to_id' => 1,
            'kelas' => '1',
            'jadwal_keberangkatan' => '2022-12-07',
            'jam_keberangkatan' => '07.00',
            'jadwal_tiba' => '2022-12-07',
            'jam_tiba' => '08.00'
        ]);

        //Bus
        Bus::create([
            'name' => 'Eka',
            'user_id' => 3,
            'from_id' => 4,
            'to_id' => 6,
            'kelas' => '1',
            'jadwal_keberangkatan' => '2022-12-07',
            'jam_keberangkatan' => '07.00',
            'jadwal_tiba' => '2022-12-07',
            'jam_tiba' => '08.00'
        ]);

        
    }
}
