<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePPWP2019Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppwp_2019', function (Blueprint $table) {
            $table->string('nama_prov');
            $table->string('nama_kab');
            $table->string('nomor_01');
            $table->string('nomor_02');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppwp_2019');
    }
}
