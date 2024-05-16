<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JemaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jemaat')->insert([
            'nik'=> "1234567890123456",
            "name"=> "Girgos",
            "jenis_kelamin"=> "Laki-laki",
            "password"=> '$2y$10$bKhaxZNZwMLYCCfgwKKGE.bD3kW21ShAwZ604/i8/bV23R2GWqxam',
            "alamat"=> "Tarutung",
            "tempat_lahir"=> "Tarutung",
            "status"=> "Aktif",
            "status_pernikahan"=> "Menikah",
            "tanggal_lahir"=> "1968/01/01",
            "tanggal_baptis"=>"2000/01/01",
            "tanggal_sidih"=> "2010/01/01",
            "sektor_id"=>1,
            "sektor_role"=> "Penanggung Jawab"
        ]);
    }
}
