<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWartaJemaat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warta_jemaat', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal");
            $table->text("isi");
            $table->text("lampiran");
            $table->timestamps();
            $table->string("created_by", 16);
            $table->string("updated_by", 16);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warta_jemaat');
    }
}
