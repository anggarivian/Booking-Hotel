<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            // $table->foreign('users_id')->references('users_id')->on('users'); 
            // $table->string('name')->references('name')->on('users');
            // $table->string('email')->references('email')->on('users');
            // $table->string('kamar_id')->references('kamar_id')->on('kamar');
            // $table->string('kelas')->references('kelas')->on('kamar');
            // $table->integer('jumlahkamar');
            // $table->integer('jumlahorang');
            // $table->string('date');
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
        Schema::dropIfExists('booking');
    }
}
