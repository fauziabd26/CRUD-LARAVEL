<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_PEGAWAI', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('tmpt_lahir');
            $table->string('tgl_lahir');
            $table->string('jk');
            $table->string('agama');
            $table->string('alamat');
            $table->uuid('kel_id');
            $table->uuid('kec_id');
            $table->uuid('prov_id');
            $table->foreign('kel_id')->references('id')->on('T_KELURAHAN')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kec_id')->references('id')->on('T_KECAMATAN')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prov_id')->references('id')->on('T_PROVINSI')
            ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('T_PEGAWAI');
    }
}
