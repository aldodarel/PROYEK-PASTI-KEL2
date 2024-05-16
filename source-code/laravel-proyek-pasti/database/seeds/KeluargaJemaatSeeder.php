<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaJemaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("jemaat_keluarga")->insert([
            "nik"=> "1234567890123456",
            "no_kk"=> "1231241241241512",
            "status"=> "Suami"
        ]);
    }
}
