<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();
            $table->text("kategori");
            $table->text("keterangan");
            $table->enum("jenis_keuangan", ["Pengeluaran", "Pemasukan"]);
            $table->date("tanggal");
            $table->double("nominal");
            $table->text("status")->default("Aktif");
            $table->text("lampiran")->nullable();
            $table->timestamps();

            $table->string("created_by", 16)->default("NULL");
            $table->string("updated_by", 16)->default("NULL");
            // $table->foreign("created_by")->references("nik")->on("jemaat");
            // $table->foreign("updated_by")->references("nik")->on("jemaat");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keuangan');
    }
}
