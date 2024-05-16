<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->timestamp("tanggal_mulai");
            $table->timestamp("tanggal_akhir")->nullable();
            $table->string("nama");
            $table->text("description");
            $table->text("lampiran")->nullable();
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
        Schema::dropIfExists('kegiatan');
    }
}
