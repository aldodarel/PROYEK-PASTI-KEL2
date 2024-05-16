<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJemaat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemaat', function (Blueprint $table) {
            $table->string('nik', 16)->primary();
            $table->string("name");
            $table->enum("jenis_kelamin", ['Laki-laki', 'Perempuan']);
            $table->string("password");
            $table->string("alamat");
            $table->string("tempat_lahir");
            $table->enum("status", ['Aktif', 'Meninggal', 'Pindah']);
            $table->enum("status_pernikahan", ['Menikah', 'Belum Menikah', 'Cerai Mati']);
            $table->date("tanggal_lahir");
            $table->date("tanggal_baptis")->nullable();
            $table->date("tanggal_sidih")->nullable();
            $table->bigInteger("sektor_id")->unsigned();
            $table->enum("sektor_role", ["Penanggung Jawab", "Anggota"])->default("Anggota");
            $table->string("profile")->default("/profile/default.png");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jemaat');
    }
}
