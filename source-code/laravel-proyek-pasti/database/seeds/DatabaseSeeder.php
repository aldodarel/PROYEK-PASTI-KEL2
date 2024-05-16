<?php

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
        $this->call([
            SektorSeeder::class,
            JemaatSeeder::class,
            PelayanGerejeSeeder::class,
            KeluargaSeeder::class,
            KeluargaJemaatSeeder::class,
        ]);
    }
}
