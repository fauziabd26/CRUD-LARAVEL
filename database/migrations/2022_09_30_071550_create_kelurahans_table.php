<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_KELURAHAN', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode');
            $table->string('name');
            $table->enum('active',[1,0]);
            $table->uuid('kec_id');
            $table->foreign('kec_id')->references('id')->on('T_KECAMATAN');
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
        Schema::dropIfExists('T_KELURAHAN');
    }
}
