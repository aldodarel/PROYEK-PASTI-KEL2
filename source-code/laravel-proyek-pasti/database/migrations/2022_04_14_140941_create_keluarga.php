<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->string("no_kk", 16)->primary();
            $table->string("nama_keluarga");
            $table->string("alamat");
            $table->string("no_telepon");
            $table->enum("status", ["Aktif", "Pindah", "Disabled"])->default("Aktif");
            $table->date("tanggal_nikah");
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
        Schema::dropIfExists('keluarga');
    }
}
