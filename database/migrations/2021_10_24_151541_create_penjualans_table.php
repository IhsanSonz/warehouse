<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaksi_stok_id')->unsigned();
            $table->string('nama_barang');
            $table->integer('harga_modal');
            $table->integer('total_harga');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('transaksi_stok_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualans');
    }
}
