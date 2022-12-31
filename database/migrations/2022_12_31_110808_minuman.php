<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minumans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_minum');
            $table->string('kode_minum');
            $table->integer('harga_minum');
            $table->integer('jumlah_minum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minumans');
    }
};
