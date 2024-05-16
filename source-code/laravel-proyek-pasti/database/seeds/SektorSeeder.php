<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("sektor")->insert([
            [
                "nama"=>"Okuli",
            ],
            [
                "nama"=>"Letare",
            ],
            [
                "nama"=>"Josua",
            ]
        ]);
    }
}
