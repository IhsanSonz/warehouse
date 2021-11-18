<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_stoks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stok_id')->unsigned();
            $table->integer('qty');
            $table->boolean('is_keluar')->default(true);
            $table->dateTime('tgl_transaksi')->default(new DateTime());
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('stok_id')->references('id')->on('stoks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_stoks');
    }
}
