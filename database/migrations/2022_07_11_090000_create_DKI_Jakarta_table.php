<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDKIJakartaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DKI_Jakarta', function (Blueprint $table) {
            $table->string('id');
            $table->string('nkk');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('kawin');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('difabel');
            $table->string('keterangan');
            $table->string('sumberdata');
            $table->string('tps');
            $table->string('kel_id');
            $table->string('kd_pro');
            $table->string('pro');
            $table->string('kd_kab');
            $table->string('kab');
            $table->string('kd_kec');
            $table->string('kec');
            $table->string('kel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DKI_Jakarta');
    }
}
