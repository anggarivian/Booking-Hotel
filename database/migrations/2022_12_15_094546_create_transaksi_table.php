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
            $table->id();
            // $table->foreignId('booking_id')->constrained();
            // $table->foreignId('booking_date')->constrained();
            // $table->foreignId('users_id')->constrained();
            // $table->foreignId('users_nama')->constrained();
            // $table->foreignId('users_email')->constrained();
            // $table->foreignId('kamar_id')->constrained();
            // $table->foreignId('kamar_nama')->constrained();
            // $table->foreignId('kamar_harga')->constrained();
            // $table->foreignId('booking_jumlahkamar')->constained();
            // $table->foreignId('booking_jumlahorang')->constained();
            // $table->integer('pembayaran');
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
        Schema::dropIfExists('transaksi');
    }
}
