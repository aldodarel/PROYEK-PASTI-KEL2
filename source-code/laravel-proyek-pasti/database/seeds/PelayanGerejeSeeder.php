<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelayanGerejeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pelayan_gereja')->insert(
            [
                "nik"=> "1234567890123456",
                "peran"=> "Pendeta",
                "tanggal_terima_jabatan"=> "2012/01/01",
                "tanggal_akhir_jabatan"=> "2027/01/01",
            ]
        );
    }
}
