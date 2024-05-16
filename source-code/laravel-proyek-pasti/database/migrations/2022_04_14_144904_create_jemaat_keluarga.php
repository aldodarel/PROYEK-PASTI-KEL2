<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJemaatKeluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemaat_keluarga', function (Blueprint $table) {
            $table->string("nik", 16);
            $table->string("no_kk", 16);
            $table->enum("status", ["Suami", "Istri", "Anak", "Menikah"]);
            $table->timestamps();

            $table->primary(["nik", "no_kk"]);
            $table->foreign("nik")->references("nik")->on("jemaat")->onDelete('cascade');
            $table->foreign("no_kk")->references("no_kk")->on("keluarga")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jemaat_keluarga');
    }
}
