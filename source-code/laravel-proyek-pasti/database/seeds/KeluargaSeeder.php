<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("keluarga")->insert([
            [
                "no_kk"=> "1231241241241512",
                "nama_keluarga"=> "Keluarga Pendeta Girgos",
                "alamat"=> "Tarutung Kota",
                "no_telepon"=> "081231414241",
                "tanggal_nikah"=> "2016/01/01"
            ],
            [
                "no_kk"=> "1231241241241515",
                "nama_keluarga"=> "Keluarga Example",
                "alamat"=> "Tarutung Kota",
                "no_telepon"=> "081231412312",
                "tanggal_nikah"=> "2016/01/01"
            ]
        ]);
    }
}
