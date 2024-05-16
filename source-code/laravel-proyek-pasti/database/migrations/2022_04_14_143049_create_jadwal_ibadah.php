<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalIbadah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_ibadah', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("tanggal");
            $table->time("waktu");
            $table->enum("pengulangan", ["Tidak Diulang", "Perminggu", "Perbulan", "Pertahun"]);
            $table->timestamps();
            
            $table->string("created_by", 16);
            $table->string("updated_by", 16);
            $table->foreign("created_by")->references("nik")->on("jemaat");
            $table->foreign("updated_by")->references("nik")->on("jemaat");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_ibadah');
    }
}
