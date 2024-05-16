<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanKeuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_keuangan', function (Blueprint $table) {
            $table->id();
            $table->Text("nama_laporan");
            $table->Date("tanggal_awal");
            $table->Date("tanggal_akhir");
            $table->String("kategori_laporan")->default("Tahunan");
            $table->double("saldo_sebelum");
            $table->text("status")->default("Aktif");
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
        Schema::dropIfExists('laporan_keuangan');
    }
}
