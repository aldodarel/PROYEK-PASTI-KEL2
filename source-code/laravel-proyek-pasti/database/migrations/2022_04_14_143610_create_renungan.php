<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renungan', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal");
            $table->string("title");
            $table->text("isi");
            $table->string("ayat");
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
        Schema::dropIfExists('renungan');
    }
}
