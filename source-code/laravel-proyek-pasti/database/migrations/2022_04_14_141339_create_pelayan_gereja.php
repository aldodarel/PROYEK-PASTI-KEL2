<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayanGereja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayan_gereja', function (Blueprint $table) {
            $table->string("nik", 16)->primary();
            $table->enum("peran", ["Pendeta", "Penatua", "Sekretaris Jemaat", "Bendahara Jemaat", "Tata Usaha"]);
            $table->date("tanggal_terima_jabatan");
            $table->date("tanggal_akhir_jabatan")->nullable();
            $table->foreign("nik")->references("nik")->on("jemaat")->onDelete('cascade');
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
        Schema::dropIfExists('pelayan_gereja');
    }
}
