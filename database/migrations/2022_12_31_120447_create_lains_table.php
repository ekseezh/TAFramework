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
        Schema::create('lains', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_lain');
            $table->string('kode_lain');
            $table->integer('harga_lain');
            $table->integer('jumlah_lain');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lains');
    }
};
