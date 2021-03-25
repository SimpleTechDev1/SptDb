<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pendaftaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();

            $table->String('namaPengunjung')->nullable();
            $table->String('hubungan')->nullable();
            $table->String('namaT')->nullable();
            $table->String('hari')->nullable();
            $table->String('waktu')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('pendaftarans');
    }
}
