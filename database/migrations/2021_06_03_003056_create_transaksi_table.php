<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('trx_id');
            $table->unsignedBigInteger('kode_buku');
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->primary('trx_id');
            $table->foreign('kode_buku')->references('kode_buku')->on('books');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
